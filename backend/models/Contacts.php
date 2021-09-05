<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "wd_contacts".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $subject
 * @property string $body
 * @property integer $postby_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property User $postby
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wd_contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'subject', 'body', 'postby_id'], 'required'],
            [['body'], 'string'],
            [['postby_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email', 'subject'], 'string', 'max' => 150],
            [['postby_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['postby_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'subject' => 'Subject',
            'body' => 'Body',
            'postby_id' => 'Postby ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostby()
    {
        return $this->hasOne(User::className(), ['id' => 'postby_id']);
    }
}
