<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wd_delicate".
 *
 * @property int $delicate_id
 * @property string $name
 * @property int $ncc_id
 * @property string $email
 * @property string $phone
 * @property string|null $photo
 * @property string|null $political_background
 * @property string|null $remarks
 * @property string|null $created_at
 * @property int $recommender_id
 *
 * @property Ncc $ncc
 * @property User $recommender
 * @property Vote[] $votes
 */
class Delicate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wd_delicate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'ncc_id', 'email', 'phone', 'recommender_id'], 'required'],
            [['ncc_id', 'recommender_id'], 'integer'],
            [['remarks'], 'string'],
            [['created_at'], 'safe'],
            [['name', 'email', 'phone'], 'string', 'max' => 100],
            [['photo'], 'string', 'max' => 150],
            [['political_background'], 'string', 'max' => 50],
            [['ncc_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ncc::className(), 'targetAttribute' => ['ncc_id' => 'ncc_id']],
            [['recommender_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['recommender_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'delicate_id' => 'Delicate ID',
            'name' => 'Name',
            'ncc_id' => 'Ncc',
            'email' => 'Email',
            'phone' => 'Phone',
            'photo' => 'Photo',
            'political_background' => 'Political Background',
            'remarks' => 'Remarks',
            'created_at' => 'Created At',
            'recommender_id' => 'Recommender',
        ];
    }

    /**
     * Gets query for [[Ncc]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNcc()
    {
        return $this->hasOne(Ncc::className(), ['ncc_id' => 'ncc_id']);
    }

    /**
     * Gets query for [[Recommender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecommender()
    {
        return $this->hasOne(User::className(), ['id' => 'recommender_id']);
    }

    /**
     * Gets query for [[Votes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVotes()
    {
        return $this->hasMany(Vote::className(), ['delicate_id' => 'delicate_id']);
    }
}
