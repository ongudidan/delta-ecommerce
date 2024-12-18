<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_county".
 *
 * @property string $id
 * @property string|null $company_id
 * @property string|null $county_id
 * @property string $name
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @property Area[] $areas
 * @property Company $company
 * @property County $county
 * @property UserAddress[] $userAddresses
 */
class SubCounty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_county';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['id', 'company_id', 'county_id', 'name', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
            [['county_id'], 'exist', 'skipOnError' => true, 'targetClass' => County::class, 'targetAttribute' => ['county_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'county_id' => 'County ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Areas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAreas()
    {
        return $this->hasMany(Area::class, ['sub_county_id' => 'id']);
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
     * Gets query for [[County]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCounty()
    {
        return $this->hasOne(County::class, ['id' => 'county_id']);
    }

    /**
     * Gets query for [[UserAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserAddresses()
    {
        return $this->hasMany(UserAddress::class, ['sub_county_id' => 'id']);
    }
}
