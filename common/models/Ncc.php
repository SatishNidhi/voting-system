<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wd_ncc".
 *
 * @property int $ncc_id
 * @property string $title
 *
 * @property Delicate[] $delicates
 */
class Ncc extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wd_ncc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ncc_id' => 'Ncc ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[Delicates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDelicates()
    {
        return $this->hasMany(Delicate::className(), ['ncc_id' => 'ncc_id']);
    }
}
