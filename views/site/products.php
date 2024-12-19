<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<!-- Loader Start -->
<?= $this->render('components/common/_loader') ?>

<!-- Loader End -->

<!-- Header Start -->
<?= $this->render('components/common/_header') ?>

<!-- Header End -->

<!-- mobile fix menu start -->
<?= $this->render('components/common/_mobile-fix') ?>

<!-- mobile fix menu end -->

<!-- Breadcrumb Section Start -->
<div class="d-none d-lg-block">
    <?= $this->render('components/common/_breadcrumb') ?>
</div>

<!-- Breadcrumb Section End -->

<!-- Search Bar Section Start -->
<?php

$form = ActiveForm::begin([
    'method' => 'get',
    'action' => ['site/products'], // Action URL
    'options' => ['class' => 'middle-box flex-grow-1 justify-content-center align-items-center px-4'],
]);

?>

<section class="search-section d-block d-sm-none">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-6 col-xl-8 mx-auto">

                <div class="search-box">
                    <?= $form->field($searchModel, 'name', [
                        'template' => '
                            <div class="input-group">
                                {input}
                                <button class="btn theme-bg-color text-white m-0" type="submit" id="button-addon1">
                                    Search
                                </button>
                            </div>',
                    ])->textInput([
                        'class' => 'form-control',
                        'placeholder' => "I'm searching for...",
                    ]) ?>
                </div>

            </div>
        </div>
    </div>
</section>


<?php ActiveForm::end(); ?>

<!-- Search Bar Section End -->

<!-- Poster Section Start -->
<?= $this->render('components/products/_poster') ?>

<!-- Poster Section End -->

<!-- Shop Section Start -->
<section class="section-b-space shop-section">
    <div class="container-fluid-lg">
        <div class="row">
            <!-- shop side left bar start -->
            <?= $this->render('components/products/_shop-left-sidebar') ?>
            <!-- shop side left bar end -->


            <div class="col-custome-9">

                <div class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                    <!-- products start -->
                    <?php foreach ($dataProvider->getModels() as $index => $row): ?>
                        <div>
                            <div class="product-box-3 h-100 wow fadeInUp">
                                <div class="product-header">
                                    <div class="product-image">
                                        <a href="<?= Url::to(['/site/product-view', 'id' => $row->id]) ?>">
                                            <img src="/web/uploads/<?= $row->thumbnail ?>"
                                                class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <div class="product-detail">
                                        <span class="span-name"><?= $row->productSubCategory->name ?></span>
                                        <a href="<?= Url::to(['/site/product-view', 'id' => $row->id]) ?>">
                                            <h5 class="name"><?= $row->name ?></h5>
                                        </a>
                                        <p class="text-content mt-1 mb-2 product-content"><?= $row->description ?></p>

                                        <h5 class="price"><span class="theme-color">Ksh. <?= number_format($row->selling_price) ?></span> <del>Ksh. <?= number_format($row->compare_price) ?></del>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- products end  -->

                </div>

                <nav class="custome-pagination">
                    <?= \yii\bootstrap5\LinkPager::widget([
                        'pagination' => $dataProvider->pagination,
                        'options' => ['class' => 'pagination justify-content-center'], // Apply your custom class
                        'linkOptions' => ['class' => 'page-link'], // Style individual page links
                        'activePageCssClass' => 'active', // Class for the active page
                        'disabledPageCssClass' => 'disabled', // Class for disabled links
                        'prevPageLabel' => '<i class="fa-solid fa-angles-left"></i>', // Previous page icon
                        'nextPageLabel' => '<i class="fa-solid fa-angles-right"></i>', // Next page icon
                        'prevPageCssClass' => 'page-item', // Class for the previous page container
                        'nextPageCssClass' => 'page-item', // Class for the next page container
                        'pageCssClass' => 'page-item', // Class for each page container
                        'maxButtonCount' => 3, // Number of visible page buttons
                    ]); ?>
                </nav>

            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->

<!-- Footer Section Start -->
<?= $this->render('components/common/_footer') ?>

<!-- Footer Section End -->

<!-- Quick View Modal Box Start -->
<?= $this->render('components/common/_quick-view-modal') ?>

<!-- Quick View Modal Box End -->

<!-- Location Modal Start -->
<?= $this->render('components/common/_location-modal') ?>

<!-- Location Modal End -->

<!-- Deal Box Modal Start -->
<?= $this->render('components/common/_deal-box-modal') ?>

<!-- Deal Box Modal End -->

<!-- Add to cart Modal Start -->
<?= $this->render('components/common/_add-to-cart-modal') ?>

<!-- Add to cart Modal End -->

<!-- Tap to top start -->
<div class="theme-option">
    <div class="back-to-top">
        <a id="back-to-top" href="#">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
</div>
<!-- Tap to top end -->

<!-- Bg overlay Start -->
<div class="bg-overlay"></div>
<!-- Bg overlay End -->