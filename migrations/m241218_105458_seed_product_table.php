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

        // Seed Product Categories and Subcategories
        $categories = [
            'Electronics',
            'Appliances',
            'Furniture',
            'Clothing',
            'Footwear',
            'Books',
            'Beauty Products',
            'Sports Equipment',
            'Toys',
            'Groceries'
        ];

        $productCategoryIds = [];
        $productSubCategoryIds = [];

        foreach ($categories as $categoryName) {
            $categoryId = Uuid::uuid4()->toString();
            $companyId = $companyIds[array_rand($companyIds)];
            $productCategoryIds[] = $categoryId;

            $this->insert('{{%product_category}}', [
                'id' => $categoryId,
                'company_id' => $companyId,
                'name' => $categoryName,
                'description' => $faker->sentence,
                'thumbnail' => $faker->imageUrl(640, 480, 'technics'),
                'created_at' => time(),
                'updated_at' => time(),
                'created_by' => $faker->uuid,
                'updated_by' => $faker->uuid,
            ]);

            for ($i = 1; $i <= 20; $i++) {
                $subcategoryName = $categoryName . " Subcategory " . $i;
                $subcategoryId = Uuid::uuid4()->toString();
                $productSubCategoryIds[$subcategoryId] = $subcategoryName;

                $this->insert('{{%product_sub_category}}', [
                    'id' => $subcategoryId,
                    'product_category_id' => $categoryId,
                    'company_id' => $companyId,
                    'name' => $subcategoryName,
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
        $productNames = [
            'Electronics' => [
                'iPhone 14', 'Samsung Galaxy S23', 'Sony WH-1000XM5', 'MacBook Pro', 'Dell XPS 13',
                'Google Pixel 7', 'OnePlus 11', 'Sony Xperia 5', 'Asus ROG Phone', 'Lenovo Legion',
                'LG OLED TV', 'Samsung QLED TV', 'Bose SoundLink', 'JBL Flip 5', 'Canon EOS R5',
                'Nikon Z6 II', 'Microsoft Surface Pro 9', 'HP Envy Laptop', 'Amazon Echo', 'Apple iPad Pro'
            ],
            'Appliances' => [
                'LG Refrigerator', 'Dyson Vacuum', 'Bosch Dishwasher', 'Samsung Washer', 'Philips Air Fryer',
                'KitchenAid Mixer', 'Instant Pot Duo', 'Breville Espresso Maker', 'Whirlpool Dryer', 'Panasonic Microwave',
                'GE Profile Oven', 'Sharp Air Purifier', 'Toshiba Rice Cooker', 'Haier Deep Freezer', 'Black+Decker Toaster Oven',
                'Samsung Air Conditioner', 'LG Washing Machine', 'Electrolux Cooker', 'Honeywell Dehumidifier', 'Ninja Blender'
            ],
            'Furniture' => [
                'Ikea Sofa', 'King Size Bed', 'Dining Table Set', 'Office Chair', 'Wooden Wardrobe',
                'Coffee Table', 'Bookshelf', 'Recliner Chair', 'Bunk Bed', 'Corner Desk',
                'Outdoor Patio Set', 'Rocking Chair', 'TV Stand', 'Bar Stool', 'Futon Sofa',
                'Side Table', 'Queen Bed Frame', 'Chaise Lounge', 'Cabinet Dresser', 'Leather Couch'
            ],
            'Clothing' => [
                'Levi\'s Jeans', 'Nike T-shirt', 'Adidas Jacket', 'Zara Dress', 'H&M Sweater',
                'Gucci Belt', 'Armani Suit', 'Patagonia Jacket', 'Under Armour Shorts', 'North Face Hoodie',
                'Puma Sportswear', 'Calvin Klein Underwear', 'Gap Polo Shirt', 'Uniqlo Thermal Wear', 'Old Navy Denim',
                'Tommy Hilfiger Coat', 'Ralph Lauren Blazer', 'Columbia Raincoat', 'Carhartt Work Pants', 'Wrangler Shirt'
            ],
            'Footwear' => [
                'Nike Air Max', 'Adidas Ultraboost', 'Puma Running Shoes', 'Clarks Formal Shoes', 'Skechers Casual Shoes',
                'Reebok CrossFit Shoes', 'Timberland Boots', 'Birkenstock Sandals', 'Crocs Classic Clog', 'Converse All Star',
                'Vans Slip-Ons', 'Hush Puppies Loafers', 'ASICS Gel-Kayano', 'New Balance Trainers', 'Dr. Martens Boots',
                'Under Armour Sneakers', 'Fila Disruptor', 'Merrell Hiking Boots', 'Keen Sandals', 'Salomon Trail Shoes'
            ],
            'Books' => [
                'Atomic Habits', 'The Alchemist', '1984 by Orwell', 'To Kill a Mockingbird', 'Harry Potter Series',
                'The Great Gatsby', 'Pride and Prejudice', 'The Catcher in the Rye', 'Becoming by Michelle Obama', 'The Road',
                'Sapiens by Harari', 'Educated by Westover', 'The Hobbit', 'Dune by Herbert', 'The Silent Patient',
                'Where the Crawdads Sing', 'Think and Grow Rich', 'Rich Dad Poor Dad', 'The Subtle Art of Not Giving a F*ck', 'It Ends with Us'
            ],
            'Beauty Products' => [
                'L\'Oreal Shampoo', 'Maybelline Lipstick', 'Nivea Cream', 'Dove Soap', 'Clinique Moisturizer',
                'Estée Lauder Serum', 'Garnier Micellar Water', 'Neutrogena Sunscreen', 'Pantene Conditioner', 'MAC Foundation',
                'Olay Anti-Aging Cream', 'Cetaphil Cleanser', 'Biotique Face Pack', 'Lakmé Compact Powder', 'Revlon Nail Polish',
                'Huda Beauty Eyeshadow', 'Kiehl\'s Night Cream', 'The Ordinary Niacinamide', 'TRESemmé Hair Spray', 'Vaseline Jelly'
            ],
            'Sports Equipment' => [
                'Wilson Tennis Racket', 'Adidas Soccer Ball', 'Yoga Mat', 'Dumbbells Set', 'Treadmill',
                'Peloton Bike', 'Speedo Swim Goggles', 'Nike Basketball', 'Under Armour Gym Bag', 'Spalding Volleyball',
                'Yonex Badminton Racket', 'Everlast Boxing Gloves', 'Callaway Golf Clubs', 'Reebok Resistance Bands', 'Bowflex Adjustable Bench',
                'Schwinn Mountain Bike', 'Decathlon Skateboard', 'Stiga Table Tennis Bat', 'Rollerblades', 'Columbia Hiking Poles'
            ],
            'Toys' => [
                'Lego Set', 'Barbie Doll', 'Hot Wheels Cars', 'NERF Blaster', 'Rubik\'s Cube',
                'Play-Doh Kit', 'Fisher-Price Walker', 'LeapFrog Tablet', 'Hasbro Board Game', 'Mattel Action Figures',
                'Melissa & Doug Puzzle', 'Ravensburger Jigsaw', 'Tonka Truck', 'Tamagotchi', 'American Girl Doll',
                'Crayola Color Set', 'Beyblade Burst', 'K\'NEX Building Set', 'Transformers Robot', 'FurReal Pet'
            ],
            'Groceries' => [
                'Organic Milk', 'Brown Bread', 'Olive Oil', 'Fresh Apples', 'Almond Butter',
                'Basmati Rice', 'Quinoa Pack', 'Chia Seeds', 'Whole Wheat Pasta', 'Granola Bars',
                'Avocado Oil', 'Raw Honey', 'Greek Yogurt', 'Free-Range Eggs', 'Spinach Leaves',
                'Peanut Butter', 'Dark Chocolate', 'Orange Juice', 'Coconut Water', 'Cheddar Cheese'
            ],
        ];


        foreach ($productSubCategoryIds as $subCategoryId => $subcategoryName) {
            $categoryName = explode(" ", $subcategoryName)[0]; // Extract category name
            $products = $productNames[$categoryName] ?? $faker->words(5); // Use predefined or random products

            for ($i = 0; $i < 100; $i++) {
                $productName = $products[array_rand($products)];
                $brandId = $brandIds[array_rand($brandIds)];
                $unitId = $unitIds[array_rand($unitIds)];

                $this->insert('{{%product}}', [
                    'id' => Uuid::uuid4()->toString(),
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
