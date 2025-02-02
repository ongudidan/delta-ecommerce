<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_info".
 *
 * @property int $id
 * @property string|null $site_title
 * @property string|null $logo
 * @property string|null $favicon
 * @property string|null $description
 */
class SiteInfo extends \yii\db\ActiveRecord
{
    public $logoFile;
    public $faviconFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['logo'], 'string'],
            [['logoFile'], 'file', 'extensions' => 'png, jpg, jpeg'],
            [['favicon'], 'string'],
            [['faviconFile'], 'file', 'extensions' => 'png, jpg, jpeg'],
            [['site_title', 'favicon', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'site_title' => 'Site Title',
            'logo' => 'Logo',
            'favicon' => 'Favicon',
            'description' => 'Description',
        ];
    }
}
