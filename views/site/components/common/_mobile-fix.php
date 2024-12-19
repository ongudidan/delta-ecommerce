<?php

use app\models\CartProduct;
use yii\helpers\Html;
use yii\helpers\Url;

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
<div class="mobile-menu d-md-none d-block mobile-cart">
    <ul>
        <li class="active">
            <a href="<?= Url::to(['/site/index']) ?>">
                <i class="iconly-Home icli"></i>
                <span>Home</span>
            </a>
        </li>

        <li class="mobile-category">
            <a href="javascript:void(0)">
                <i class="iconly-Category icli js-link"></i>
                <span>Category</span>
            </a>
        </li>

        <li>
            <a href="<?= Url::to(['/site/index']) ?>" class="search-box">
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
        </li>

    </ul>
</div>