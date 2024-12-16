<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_image".
 *
 * @property string $id
 * @property string|null $product_id
 * @property string|null $image
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Product $product
 */
class ProductImage extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['id'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['id', 'product_id', 'image'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['file'], 'file'],

            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}
