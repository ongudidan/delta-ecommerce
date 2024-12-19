<?php

use app\models\CartProduct;
use yii\helpers\Html;
use yii\helpers\Url;

// Get the current module, controller, and action
$module = Yii::$app->controller->module->id;
$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;

// Assuming you're using Yii's ActiveRecord for CartProduct model
$userId = Yii::$app->user->id; // Get the logged-in user's ID

// Calculate the total quantity for the logged-in user
$totalQuantity = CartProduct::find()
    ->where(['user_id' => $userId])
    ->sum('quantity');
if ($totalQuantity <= 0) {
    $totalQuantity = 0;
}

?>

<?php

$menuItems = [
    [
        'label' => 'Home',
        'url' => Url::to(['/site/index']),
        'icon' => 'fas fa-home',
        'active' => $controller === 'site' && $action === 'index',
    ],
    [
        'label' => 'Products',
        'icon' => 'fas fa-box-open',
        'active' => $controller === 'site' && $action === 'products',
        'url' => Url::to(['/site/products'])
    ],
    [
        'label' => 'Cart',
        'url' => Url::to(['/site/cart']),
        'icon' => 'fas fa-shopping-cart',
        'active' => $controller === 'site' && $action === 'cart',
    ],
    [
        'label' => 'Orders',
        'icon' => 'fas fa-clipboard-list',
        'active' => $controller === 'user-dashboard' && $action === 'orders',
        'url' => Url::to(['/user-dashboard/orders'])
    ],
    [
        'label' => 'Account',
        'icon' => 'fas fa-user-circle',
        'active' => $controller === 'user-dashboard' && $action === 'profile',
        'url' => Url::to(['/user-dashboard/profile'])  // Assuming the profile is the main link, no submenu
    ],
];
?>


<div class="mobile-menu d-md-none d-block mobile-cart">
    <ul>
        <?php foreach ($menuItems as $menuItem) { ?>
            <li class="<?= $menuItem['active'] ? 'active' : '' ?>">
                <a href="<?= $menuItem['url'] ?>">
                    <i class="<?= $menuItem['icon'] ?> icli"></i>
                    <span><?= $menuItem['label'] ?></span>
                </a>
            </li>
        <?php } ?>

        <!-- <li class="mobile-category">
            <a href="javascript:void(0)">
                <i class="iconly-Category icli js-link"></i>
                <span>Category</span>
            </a>
        </li>

        <li>
            <a href="<?= Url::to(['/site/products']) ?>" class="search-box">
                <i class="iconly-Search icli"></i>
                <span>Search</span>
            </a>
        </li>

        <li>
            <a href="<?= Url::to(['/site/index']) ?>" class="notifi-wishlist">
                <i class="iconly-Heart icli"></i>
                <span>My Wish</span>
            </a>
        </li>

        <li>
            <a href="<?= Url::to(['/site/cart']) ?>">
                <i class="iconly-Bag-2 icli fly-cate"></i>
                <span>Cart</span>

            </a>
        </li> -->

    </ul>
</div>