<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string|null $product_sub_category_id
 * @property string|null $product_category_id
 * @property string|null $company_id
 * @property string|null $name
 * @property float|null $selling_price
 * @property string|null $product_number
 * @property string|null $description
 * @property string|null $thumbnail
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @property Company $company
 * @property ProductCategory $productCategory
 * @property ProductSubCategory $productSubCategory
 * @property PurchaseProduct[] $purchaseProducts
 * @property SaleProduct[] $saleProducts
 */
class Product extends \yii\db\ActiveRecord
{
    public $file;
    public $order_count;
    public $total_amount;
    public $stock;



    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
            ],
            [
                'class' => BlameableBehavior::class,
            ],

        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name',  'compare_price', 'selling_price'], 'required'],
            [['selling_price'], 'number'],
            [['created_at', 'updated_at'], 'integer'],
            [['id', 'product_sub_category_id', 'product_category_id', 'company_id', 'brand_id', 'unit_id', 'name', 'product_number', 'specifications', 'thumbnail', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['description'], 'safe'],
            [['product_sub_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductSubCategory::class, 'targetAttribute' => ['product_sub_category_id' => 'id']],
            [['product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::class, 'targetAttribute' => ['product_category_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
            [['file'], 'file', 'skipOnEmpty' => true],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_sub_category_id' => 'Product Sub Category',
            'product_category_id' => 'Product Category',
            'company_id' => 'Company',
            'unit_id' => 'Unit',
            'brand_id' => 'Brand',

            'name' => 'Name',
            'selling_price' => 'Selling Price',
            'product_number' => 'Product Number',
            'description' => 'Description',
            'thumbnail' => 'Thumbnail',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'company_id']);
    }

    /**
     * Gets query for [[ProductCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::class, ['id' => 'product_category_id']);
    }

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }

    public function getUnit()
    {
        return $this->hasOne(Unit::class, ['id' => 'unit_id']);
    }

    /**
     * Gets query for [[ProductSubCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductSubCategory()
    {
        return $this->hasOne(ProductSubCategory::class, ['id' => 'product_sub_category_id']);
    }

    /**
     * Gets query for [[PurchaseProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseProducts()
    {
        return $this->hasMany(PurchaseProduct::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[SaleProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaleProducts()
    {
        return $this->hasMany(SaleProduct::class, ['product_id' => 'id']);
    }

    public function getProductImage()
    {
        return $this->hasMany(ProductImage::class, ['product_id' => 'id']);
    }

    public function getImage_url()
    {
        return '/web/cms/assets/svg/' . $this->name . '.svg';
    }

    public function getImageUrl()
    {
        return $this->image_path ? '/uploads/products/' . $this->image_path : '/web/cms/assets/images/product/1.png';
    }


}
