<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "wd_mail".
 *
 * @property int $id
 * @property string $from
 * @property string $cc
 * @property string $bcc
 */
class Mail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wd_mail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from'], 'required'],
            [['from', 'cc', 'bcc'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'cc' => 'Cc',
            'bcc' => 'Bcc',
        ];
    }
}
