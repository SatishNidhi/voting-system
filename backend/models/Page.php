<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "wd_page".
 *
 * @property int $id
 * @property string $slug
 * @property string $image
 * @property string $title
 * @property string $excerpt
 * @property string $content
 * @property int $postby_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 *
 * @property User $postby
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wd_page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'title', 'content', 'postby_id'], 'required'],
            [['excerpt', 'content'], 'string'],
            [['postby_id', 'status'], 'integer'],
            [['image', 'excerpt', 'created_at', 'updated_at'], 'safe'],
            [['slug', 'image'], 'string', 'max' => 225],
            [['title'], 'string', 'max' => 255],
            [['postby_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['postby_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'image' => 'Image',
            'title' => 'Title',
            'excerpt' => 'Excerpt',
            'content' => 'Content',
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
