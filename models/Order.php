<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order".
 *
 * @property string $id
 * @property string|null $user_id
 * @property string|null $address
 * @property string|null $payment_option
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $phone_no
 * @property string|null $county
 * @property string|null $sub_county
 * @property string|null $area
 * @property string|null $order_no
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 *
 * @property OrderItem[] $orderItems
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    public $address_id;
    public $phone_number;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                // 'createdAtAttribute' => 'created_at',
                // 'updatedAtAttribute' => 'updated_at',
            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => false // disable updated_by,

            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address_id', 'payment_option'], 'required'],
            [['created_at', 'updated_at', 'created_by'], 'integer'],
            [['id', 'user_id', 'address_id', 'address', 'payment_option', 'first_name', 'last_name', 'phone_no', 'county', 'sub_county', 'area', 'order_no'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
            'user_id' => 'User ID',
            'address' => 'Address',
            'address_id' => 'Address',
            'payment_option' => 'Payment Option',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone_no' => 'Phone No',
            'county' => 'County',
            'sub_county' => 'Sub County',
            'area' => 'Area',
            'order_no' => 'Order No',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }


    public static function generateOrderNo()
    {
        $year = date('Y');
        $prefix = '#';
        $yearPrefix = substr($year, -2);

        // Get the maximum card number from the database
        $lastRecord = self::find()
            ->select(['order_no'])
            ->orderBy(['order_no' => SORT_DESC])
            ->limit(1)
            ->one();

        // Extract the last number from the highest card number
        if ($lastRecord && preg_match('/(\d{5})' . $yearPrefix . '$/', $lastRecord->order_no, $matches)) {
            $lastNumber = intval($matches[1]);
        } else {
            $lastNumber = 0;  // Default to 0 if no records found
        }

        // Increment the last number to create a new number
        $newNumber = str_pad($lastNumber + 1, 5, '0', STR_PAD_LEFT);

        return $prefix . $newNumber . $yearPrefix;
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['order_id' => 'id']);
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

    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }

    public function getPayment()
    {
        return $this->hasOne(Payment::class, ['external_reference' => 'id']);
    }


}
