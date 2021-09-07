<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wd_vote".
 *
 * @property int $vote_id
 * @property int $delicate_id
 * @property int $candidate_id
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
            [['delicate_id', 'candidate_id'], 'required'],
            [['delicate_id', 'candidate_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vote_id' => 'Vote ID',
            'delicate_id' => 'Delicate ID',
            'candidate_id' => 'Candidate ID',
        ];
    }
}
