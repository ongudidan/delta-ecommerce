<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banner1".
 *
 * @property int $id
 * @property int|null $offer_percentage
 * @property string|null $title
 * @property string|null $description
 * @property string|null $image
 * @property string|null $product_link
 */
class Banner1 extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['offer_percentage'], 'integer'],
            [['description'], 'string'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['title', 'image', 'product_link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'offer_percentage' => 'Offer Percentage',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
            'product_link' => 'Product Link',
        ];
    }
}
