<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "main_banner".
 *
 * @property int $id
 * @property int|null $offer_percentage
 * @property string|null $title
 * @property string|null $description
 * @property string|null $video
 * @property string|null $product_link
 */
class MainBanner extends \yii\db\ActiveRecord
{
    public $videoFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'main_banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['offer_percentage'], 'integer'],
            [['description'], 'string'],
            [['videoFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'mp4, mov, avi, flv, wmv, 3gp, mkv, webm, ogg'],
            [['title', 'video', 'product_link'], 'string', 'max' => 255],
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
            'video' => 'Video',
            'product_link' => 'Product Link',
        ];
    }
}
