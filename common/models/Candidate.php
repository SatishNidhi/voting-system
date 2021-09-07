<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wd_candidate".
 *
 * @property int $candidate_id
 * @property string $name
 * @property int $position_id
 *
 * @property Vote[] $votes
 */
class Candidate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wd_candidate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'position_id'], 'required'],
            [['position_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'candidate_id' => 'Candidate ID',
            'name' => 'Name',
            'position_id' => 'Position',
        ];
    }

    /**
     * Gets query for [[Votes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVotes()
    {
        return $this->hasMany(Vote::className(), ['candidate_id' => 'candidate_id']);
    }

    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['position_id' => 'position_id']);
    }
}
