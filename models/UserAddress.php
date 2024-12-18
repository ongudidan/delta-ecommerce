<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_address".
 *
 * @property string $id
 * @property string|null $company_id
 * @property string|null $county_id
 * @property string|null $user_id
 * @property string|null $sub_county_id
 * @property string|null $area_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $phone_no
 * @property string|null $address
 * @property string|null $default
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @property Area $area
 * @property Company $company
 * @property County $county
 * @property SubCounty $subCounty
 * @property User $user
 */
class UserAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['id', 'company_id', 'county_id', 'user_id', 'sub_county_id', 'area_id', 'first_name', 'last_name', 'phone_no', 'address', 'default', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['company_id' => 'id']],
            [['county_id'], 'exist', 'skipOnError' => true, 'targetClass' => County::class, 'targetAttribute' => ['county_id' => 'id']],
            [['sub_county_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubCounty::class, 'targetAttribute' => ['sub_county_id' => 'id']],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Area::class, 'targetAttribute' => ['area_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
            'sub_county_id' => 'Sub County ID',
            'area_id' => 'Area ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone_no' => 'Phone No',
            'address' => 'Address',
            'default' => 'Default',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Area]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::class, ['id' => 'area_id']);
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
     * Gets query for [[SubCounty]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubCounty()
    {
        return $this->hasOne(SubCounty::class, ['id' => 'sub_county_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
