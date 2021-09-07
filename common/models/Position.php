<?php

namespace common\models;

use Yii;
use common\models\Candidate;

/**
 * This is the model class for table "wd_position".
 *
 * @property int $position_id
 * @property string $title
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wd_position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'position_id' => 'Position ID',
            'title' => 'Title',
        ];
    }

    public function getCandidate()
    {
        return $this->hasMany(Candidate::className(), ['position_id' => 'position_id']);
    }
}
