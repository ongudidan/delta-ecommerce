<?php

use yii\widgets\Breadcrumbs;
?>

<!-- (d-none d-md-block) prevent display on mobile view -->

<section class="breadscrumb-section pt-0 d-none d-md-block">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center breadscrumb-contain">
                    <!-- Left: Page Title -->
                    <h2 class="mb-0"><?= $this->title; ?></h2>

                    <!-- Right: Breadcrumb -->
                    <nav>
                        <?= Breadcrumbs::widget([
                            'homeLink' => [
                                'label' => '<i class="fa-solid fa-house"></i>',
                                'url' => ['site/index'], // Adjust to your home route
                                'encode' => false, // Allows HTML in the label
                            ],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            'options' => ['class' => 'breadcrumb mb-0'],
                            'itemTemplate' => "<li class=\"breadcrumb-item\">{link}</li>\n", // Template for items
                            'activeItemTemplate' => "<li class=\"breadcrumb-item active\" aria-current=\"page\">{link}</li>\n", // Template for active item
                        ]); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>