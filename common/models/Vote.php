<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wd_vote".
 *
 * @property int $vote_id
 * @property int $wd_delicate_id
 * @property int $wd_candidate_id
 *
 * @property Candidate $wdCandidate
 * @property Delicate $wdDelicate
 */
class Vote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wd_vote';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wd_delicate_id', 'wd_candidate_id'], 'required'],
            [['wd_delicate_id', 'wd_candidate_id'], 'integer'],
            [['wd_candidate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Candidate::className(), 'targetAttribute' => ['wd_candidate_id' => 'candidate_id']],
            [['wd_delicate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Delicate::className(), 'targetAttribute' => ['wd_delicate_id' => 'delicate_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vote_id' => 'Vote ID',
            'wd_delicate_id' => 'Delicate Name',
            'wd_candidate_id' => 'Candidate Name',
        ];
    }

    /**
     * Gets query for [[WdCandidate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCandidate()
    {
        return $this->hasOne(Candidate::className(), ['candidate_id' => 'wd_candidate_id']);
    }

    /**
     * Gets query for [[WdDelicate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDelicate()
    {
        return $this->hasOne(Delicate::className(), ['delicate_id' => 'wd_delicate_id']);
    }
}
