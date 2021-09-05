<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wd_product_enquiry".
 *
 * @property int $enquiry_id
 * @property string|null $name
 * @property string|null $product
 * @property string|null $email
 * @property int|null $phone
 * @property string|null $enquiry_content
 * @property string|null $date
 */
class ProductEnquiry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wd_product_enquiry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
             [['name', 'product', 'email','enquiry_content','phone'], 'required'],
            ['email', 'email'],

            [['phone'], 'integer'],
            [['enquiry_content'], 'string'],
            [['date'], 'safe'],
            [['name', 'product', 'email'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enquiry_id' => 'Enquiry ID',
            'name' => 'Name',
            'product' => 'Product',
            'email' => 'Email',
            'phone' => 'Phone',
            'enquiry_content' => 'Enquiry Content',
            'date' => 'Date',
        ];
    }
}
