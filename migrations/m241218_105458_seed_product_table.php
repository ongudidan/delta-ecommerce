<?php

use Ramsey\Uuid\Uuid;
use yii\db\Migration;

/**
 * Class m241218_105458_seed_product_table
 */
class m241218_105458_seed_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = \Faker\Factory::create();

        // Seed Companies
        $companyIds = [];
        $companies = ['Apple Inc.', 'Samsung Electronics', 'Sony Corporation', 'Microsoft Corp.', 'Dell Technologies'];
        foreach ($companies as $company) {
            $id =Uuid::uuid4()->toString();
            $companyIds[] = $id;
            $this->insert('{{%company}}', [
                'id' => $id,
                'name' => $company,
                'description' => $faker->catchPhrase,
                'created_at' => time(),
                'updated_at' => time(),
                'status' => 10,
            ]);
        }

        // Seed Brands
        $brands = [
            'Apple',
            'Samsung',
            'Sony',
            'Microsoft',
            'Dell',
            'HP',
            'Asus',
            'Acer',
            'LG',
            'Lenovo'
        ];
        $brandIds = [];
        foreach ($brands as $brandName) {
            $id =Uuid::uuid4()->toString();
            $companyId = $companyIds[array_rand($companyIds)];
            $brandIds[] = $id;
            $this->insert('{{%brand}}', [
                'id' => $id,
                'company_id' => $companyId,
                'name' => $brandName,
                'logo' => $faker->imageUrl(640, 480, 'business'),
                'description' => $faker->sentence,
                'status' => 'active',
                'created_at' => time(),
                'updated_at' => time(),
                'created_by' => $faker->uuid,
                'updated_by' => $faker->uuid,
            ]);
        }

        // Seed Units
        $units = [
            ['name' => 'Piece', 'abbreviation' => 'pc'],
            ['name' => 'Kilogram', 'abbreviation' => 'kg'],
            ['name' => 'Liter', 'abbreviation' => 'L'],
            ['name' => 'Box', 'abbreviation' => 'box'],
            ['name' => 'Set', 'abbreviation' => 'set'],
        ];
        $unitIds = [];
        foreach ($units as $unit) {
            $id =Uuid::uuid4()->toString();
            $companyId = $companyIds[array_rand($companyIds)];
            $unitIds[] = $id;
            $this->insert('{{%unit}}', [
                'id' => $id,
                'company_id' => $companyId,
                'name' => $unit['name'],
                'abbreviation' => $unit['abbreviation'],
                'status' => 'active',
                'created_at' => time(),
                'updated_at' => time(),
                'created_by' => $faker->uuid,
                'updated_by' => $faker->uuid,
            ]);
        }

        // Real Product Categories and Subcategories
        $categories = [
            'Electronics' => [
                'Smartphones',
                'Laptops',
                'Tablets',
                'Televisions',
                'Cameras',
            ],
            'Appliances' => [
                'Refrigerators',
                'Microwaves',
                'Washing Machines',
                'Air Conditioners',
                'Vacuum Cleaners',
            ],
            'Furniture' => [
                'Sofas',
                'Beds',
                'Dining Tables',
                'Chairs',
                'Wardrobes',
            ],
        ];

        $productCategoryIds = [];
        $productSubCategoryIds = [];

        // Seed Product Categories and Subcategories
        foreach ($categories as $category => $subcategories) {
            $categoryId =Uuid::uuid4()->toString();
            $companyId = $companyIds[array_rand($companyIds)];
            $productCategoryIds[] = $categoryId;

            $this->insert('{{%product_category}}', [
                'id' => $categoryId,
                'company_id' => $companyId,
                'name' => $category,
                'description' => $faker->sentence,
                'thumbnail' => $faker->imageUrl(640, 480, 'technics'),
                'created_at' => time(),
                'updated_at' => time(),
                'created_by' => $faker->uuid,
                'updated_by' => $faker->uuid,
            ]);

            foreach ($subcategories as $subcategory) {
                $subcategoryId =Uuid::uuid4()->toString();
                $productSubCategoryIds[] = $subcategoryId;

                $this->insert('{{%product_sub_category}}', [
                    'id' => $subcategoryId,
                    'product_category_id' => $categoryId,
                    'company_id' => $companyId,
                    'name' => $subcategory,
                    'description' => $faker->sentence,
                    'thumbnail' => $faker->imageUrl(640, 480, 'fashion'),
                    'created_at' => time(),
                    'updated_at' => time(),
                    'created_by' => $faker->uuid,
                    'updated_by' => $faker->uuid,
                ]);
            }
        }

        // Seed Products
        $products = [
            'Smartphones' => ['iPhone 14', 'Samsung Galaxy S23', 'Google Pixel 7', 'OnePlus 11', 'Sony Xperia 5'],
            'Laptops' => ['MacBook Pro', 'Dell XPS 13', 'HP Spectre x360', 'Asus ROG Zephyrus', 'Lenovo ThinkPad X1'],
            'Refrigerators' => ['LG Door-in-Door', 'Samsung French Door', 'Whirlpool Double Door', 'Bosch Series 4', 'Haier HRF'],
        ];

        foreach ($productSubCategoryIds as $subCategoryId) {
            $subcategoryName = $this->getDb()->createCommand("SELECT name FROM {{%product_sub_category}} WHERE id = :id", [':id' => $subCategoryId])->queryScalar();
            if (isset($products[$subcategoryName])) {
                foreach ($products[$subcategoryName] as $productName) {
                    $brandId = $brandIds[array_rand($brandIds)];
                    $unitId = $unitIds[array_rand($unitIds)];

                    $this->insert('{{%product}}', [
                        'id' =>Uuid::uuid4()->toString(),
                        'product_category_id' => $productCategoryIds[array_rand($productCategoryIds)],
                        'brand_id' => $brandId,
                        'unit_id' => $unitId,
                        'company_id' => $companyIds[array_rand($companyIds)],
                        'product_sub_category_id' => $subCategoryId,
                        'name' => $productName,
                        'selling_price' => $faker->randomFloat(2, 100, 1000),
                        'compare_price' => $faker->randomFloat(2, 100, 1500),
                        'product_number' => strtoupper($faker->bothify('??-#####')),
                        'description' => $faker->sentence,
                        'specifications' => $faker->sentence,
                        'status' => $faker->randomElement(['active', 'inactive']),
                        'thumbnail' => $faker->imageUrl(640, 480, 'technics'),
                        'created_at' => time(),
                        'updated_at' => time(),
                        'created_by' => $faker->uuid,
                        'updated_by' => $faker->uuid,
                    ]);
                }
            }
        }

        // Create user
        $this->insert('{{%user}}', [
            'id' =>Uuid::uuid4()->toString(),
            'company_id' => $companyIds[array_rand($companyIds)],
            'username' => 'admin',
            'phone_no' => '0768540722',
            'first_name' => 'Admin',
            'last_name' => '',
            'verification_token' =>Uuid::uuid4()->toString(),
            'auth_key' => \Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('12345678'), // Encrypt password
            'password_reset_token' =>Uuid::uuid4()->toString(),
            'email' => 'admin@gmail.com',
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    public function safeDown()
    {
        $this->truncateTable('{{%product}}');
        $this->truncateTable('{{%product_sub_category}}');
        $this->truncateTable('{{%product_category}}');
        $this->truncateTable('{{%unit}}');
        $this->truncateTable('{{%brand}}');
        $this->truncateTable('{{%company}}');
        $this->truncateTable('{{%user}}');
    }
}
