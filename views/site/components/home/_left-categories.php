<?php

use app\models\ProductCategory;
use yii\helpers\Url;

$productCategories = ProductCategory::find()->all();
?>
<div class="category-menu">
    <h3>Category</h3>
    <ul class="list-unstyled m-0 p-0">
        <?php foreach ($productCategories as $row) { ?>
            <li class="mb-1">
                <div class="category-list text-center">
                    <!-- Image inside a very small circle -->
                    <img
                        src="/web/uploads/<?= $row->thumbnail ?>"
                        class="img-fluid rounded-circle"
                        alt="<?= $row->name ?>"
                        style="width: 10px; height: 10px; object-fit: cover;" />
                    <h5 class="my-1">
                        <a href="<?= Url::to(['/site/products']) ?>"><?= $row->name ?></a>
                    </h5>
                </div>
            </li>
        <?php } ?>
    </ul>

</div>