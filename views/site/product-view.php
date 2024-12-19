<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['products']];
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
<?= $this->render('components/common/_breadcrumb') ?>

<!-- Breadcrumb Section End -->

<!-- Product Left Sidebar Start -->
<section class="product-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 wow fadeInUp">
                <div class="row g-4">
                    <div class="col-xl-6 wow fadeInUp">
                        <div class="product-left-box">
                            <div class="row g-2">
                                <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                    <div class="product-main-2 no-arrow">
                                        <div>
                                            <div class="slider-image">
                                                <img src="/web/uploads/<?= $model->thumbnail ?>"
                                                    class="img-fluid image_zoom_cls-0 blur-up lazyload" alt="">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="right-box-contain">
                            <h2 class="name"><?= $model->name ?></h2>
                            <div class="price-rating">
                                <h3 class="theme-color price">Ksh. <?= number_format($model->selling_price) ?> <del class="text-content">Ksh. <?= number_format($model->compare_price) ?> </del>
                            </div>

                            <div class="note-box product-packege">
                                <?php $form = ActiveForm::begin([
                                    'id' => 'add-to-cart-form',
                                    'action' => Url::to(['site/add']),
                                    'options' => [
                                        'class' => 'cart-form',
                                        'onsubmit' => 'submitAddToCartForm(event)',
                                    ],
                                ]); ?>

                                <?= Html::hiddenInput('product_id', $model->id); // Set $productId dynamically 
                                ?>

                                <div class="row align-items-center">
                                    <!-- Quantity Section -->
                                    <div class="col-md-6 col-sm-12 d-flex justify-content-center align-items-center">
                                        <div class="cart_qty qty-box product-qty">
                                            <div class="input-group w-100">
                                                <button type="button" class="qty-left-minus" data-type="minus" data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <?= Html::textInput('quantity', 1, [
                                                    'class' => 'form-control input-number qty-input',
                                                    'name' => 'quantity',
                                                ]); ?>
                                                <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add to Cart Button -->
                                    <div class="col-md-6 col-sm-12">
                                        <?= Html::submitButton('Add To Cart', [
                                            'class' => 'btn btn-md bg-dark cart-button text-white w-100',
                                        ]); ?>
                                    </div>
                                </div>

                                <?php ActiveForm::end(); ?>
                            </div>


                        </div>
                    </div>

                    <div class="col-12">
                        <div class="product-section-box">
                            <ul class="nav nav-tabs custom-nav" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                        data-bs-target="#description" type="button" role="tab"
                                        aria-controls="description" aria-selected="true">Description</button>
                                </li>

                                <!-- <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="info-tab" data-bs-toggle="tab"
                                            data-bs-target="#info" type="button" role="tab" aria-controls="info"
                                            aria-selected="false">Additional info</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="care-tab" data-bs-toggle="tab"
                                            data-bs-target="#care" type="button" role="tab" aria-controls="care"
                                            aria-selected="false">Care Instuctions</button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="review-tab" data-bs-toggle="tab"
                                            data-bs-target="#review" type="button" role="tab" aria-controls="review"
                                            aria-selected="false">Review</button>
                                    </li> -->
                            </ul>

                            <div class="tab-content custom-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <div class="product-description">
                                        <div class="nav-desh">
                                            <p><?= $model->description ?></p>
                                        </div>
                                        <!-- 
                                            <div class="nav-desh">
                                                <div class="desh-title">
                                                    <h5>Organic:</h5>
                                                </div>
                                                <p>vitae et leo duis ut diam quam nulla porttitor massa id neque aliquam
                                                    vestibulum morbi blandit cursus risus at ultrices mi tempus
                                                    imperdiet nulla malesuada pellentesque elit eget gravida cum sociis
                                                    natoque penatibus et magnis dis parturient montes nascetur ridiculus
                                                    mus mauris vitae ultricies leo integer malesuada nunc vel risus
                                                    commodo viverra maecenas accumsan lacus vel facilisis volutpat est
                                                    velit egestas dui id ornare arcu odio ut sem nulla pharetra diam sit
                                                    amet nisl suscipit adipiscing bibendum est ultricies integer quis
                                                    auctor elit sed vulputate mi sit amet mauris commodo quis imperdiet
                                                    massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada
                                                    proin libero nunc consequat interdum varius sit amet mattis
                                                    vulputate enim nulla aliquet porttitor lacus luctus accumsan.</p>
                                            </div>

                                            <div class="banner-contain nav-desh">
                                                <img src="/web/frontend/assets/images/vegetable/banner/14.jpg"
                                                    class="bg-img blur-up lazyload" alt="">
                                                <div class="banner-details p-center banner-b-space w-100 text-center">
                                                    <div>
                                                        <h6 class="ls-expanded theme-color mb-sm-3 mb-1">SUMMER</h6>
                                                        <h2>VEGETABLE</h2>
                                                        <p class="mx-auto mt-1">Save up to 5% OFF</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="nav-desh">
                                                <div class="desh-title">
                                                    <h5>From The Manufacturer:</h5>
                                                </div>
                                                <p>Jelly beans shortbread chupa chups carrot cake jelly-o halvah apple
                                                    pie pudding gingerbread. Apple pie halvah cake tiramisu shortbread
                                                    cotton candy croissant chocolate cake. Tart cupcake caramels gummi
                                                    bears macaroon gingerbread fruitcake marzipan wafer. Marzipan
                                                    dessert cupcake ice cream tootsie roll. Brownie chocolate cake
                                                    pudding cake powder candy ice cream ice cream cake. Jujubes soufflé
                                                    chupa chups cake candy halvah donut. Tart tart icing lemon drops
                                                    fruitcake apple pie.</p>

                                                <p>Dessert liquorice tart soufflé chocolate bar apple pie pastry danish
                                                    soufflé. Gummi bears halvah gingerbread jelly icing. Chocolate cake
                                                    chocolate bar pudding chupa chups bear claw pie dragée donut halvah.
                                                    Gummi bears cookie ice cream jelly-o jujubes sweet croissant.
                                                    Marzipan cotton candy gummi bears lemon drops lollipop lollipop
                                                    chocolate. Ice cream cookie dragée cake sweet roll sweet roll.Lemon
                                                    drops cookie muffin carrot cake chocolate marzipan gingerbread
                                                    topping chocolate bar. Soufflé tiramisu pastry sweet dessert.</p>
                                            </div> -->
                                    </div>
                                </div>

                                <!-- <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                                        <div class="table-responsive">
                                            <table class="table info-table">
                                                <tbody>
                                                    <tr>
                                                        <td>Specialty</td>
                                                        <td>Vegetarian</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ingredient Type</td>
                                                        <td>Vegetarian</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Brand</td>
                                                        <td>Lavian Exotique</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Form</td>
                                                        <td>Bar Brownie</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Package Information</td>
                                                        <td>Box</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Manufacturer</td>
                                                        <td>Prayagh Nutri Product Pvt Ltd</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Item part number</td>
                                                        <td>LE 014 - 20pcs Crème Bakes (Pack of 2)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Net Quantity</td>
                                                        <td>40.00 count</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="care" role="tabpanel" aria-labelledby="care-tab">
                                        <div class="information-box">
                                            <ul>
                                                <li>Store cream cakes in a refrigerator. Fondant cakes should be
                                                    stored in an air conditioned environment.</li>

                                                <li>Slice and serve the cake at room temperature and make sure
                                                    it is not exposed to heat.</li>

                                                <li>Use a serrated knife to cut a fondant cake.</li>

                                                <li>Sculptural elements and figurines may contain wire supports
                                                    or toothpicks or wooden skewers for support.</li>

                                                <li>Please check the placement of these items before serving to
                                                    small children.</li>

                                                <li>The cake should be consumed within 24 hours.</li>

                                                <li>Enjoy your cake!</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                        <div class="review-box">
                                            <div class="row g-4">
                                                <div class="col-xl-6">
                                                    <div class="review-title">
                                                        <h4 class="fw-500">Customer reviews</h4>
                                                    </div>

                                                    <div class="d-flex">
                                                        <div class="product-rating">
                                                            <ul class="rating">
                                                                <li>
                                                                    <i data-feather="star" class="fill"></i>
                                                                </li>
                                                                <li>
                                                                    <i data-feather="star" class="fill"></i>
                                                                </li>
                                                                <li>
                                                                    <i data-feather="star" class="fill"></i>
                                                                </li>
                                                                <li>
                                                                    <i data-feather="star"></i>
                                                                </li>
                                                                <li>
                                                                    <i data-feather="star"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <h6 class="ms-3">4.2 Out Of 5</h6>
                                                    </div>

                                                    <div class="rating-box">
                                                        <ul>
                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>5 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 68%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            68%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>4 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 67%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            67%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>3 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 42%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            42%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>2 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 30%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            30%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="rating-list">
                                                                    <h5>1 Star</h5>
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar"
                                                                            style="width: 24%" aria-valuenow="100"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                            24%
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6">
                                                    <div class="review-title">
                                                        <h4 class="fw-500">Add a review</h4>
                                                    </div>

                                                    <div class="row g-4">
                                                        <div class="col-md-6">
                                                            <div class="form-floating theme-form-floating">
                                                                <input type="text" class="form-control" id="name"
                                                                    placeholder="Name">
                                                                <label for="name">Your Name</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-floating theme-form-floating">
                                                                <input type="email" class="form-control" id="email"
                                                                    placeholder="Email Address">
                                                                <label for="email">Email Address</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-floating theme-form-floating">
                                                                <input type="url" class="form-control" id="website"
                                                                    placeholder="Website">
                                                                <label for="website">Website</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-floating theme-form-floating">
                                                                <input type="url" class="form-control" id="review1"
                                                                    placeholder="Give your review a title">
                                                                <label for="review1">Review Title</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-floating theme-form-floating">
                                                                <textarea class="form-control"
                                                                    placeholder="Leave a comment here"
                                                                    id="floatingTextarea2"
                                                                    style="height: 150px"></textarea>
                                                                <label for="floatingTextarea2">Write Your
                                                                    Comment</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="review-title">
                                                        <h4 class="fw-500">Customer questions & answers</h4>
                                                    </div>

                                                    <div class="review-people">
                                                        <ul class="review-list">
                                                            <li>
                                                                <div class="people-box">
                                                                    <div>
                                                                        <div class="people-image">
                                                                            <img src="/web/frontend/assets/images/review/1.jpg"
                                                                                class="img-fluid blur-up lazyload"
                                                                                alt="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="people-comment">
                                                                        <a class="name"
                                                                            href="javascript:void(0)">Tracey</a>
                                                                        <div class="date-time">
                                                                            <h6 class="text-content">14 Jan, 2022 at
                                                                                12.58 AM</h6>

                                                                            <div class="product-rating">
                                                                                <ul class="rating">
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"></i>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>

                                                                        <div class="reply">
                                                                            <p>Icing cookie carrot cake chocolate cake
                                                                                sugar plum jelly-o danish. Dragée dragée
                                                                                shortbread tootsie roll croissant muffin
                                                                                cake I love gummi bears. Candy canes ice
                                                                                cream caramels tiramisu marshmallow cake
                                                                                shortbread candy canes cookie.<a
                                                                                    href="javascript:void(0)">Reply</a>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="people-box">
                                                                    <div>
                                                                        <div class="people-image">
                                                                            <img src="/web/frontend/assets/images/review/2.jpg"
                                                                                class="img-fluid blur-up lazyload"
                                                                                alt="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="people-comment">
                                                                        <a class="name"
                                                                            href="javascript:void(0)">Olivia</a>
                                                                        <div class="date-time">
                                                                            <h6 class="text-content">01 May, 2022 at
                                                                                08.31 AM</h6>
                                                                            <div class="product-rating">
                                                                                <ul class="rating">
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"></i>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>

                                                                        <div class="reply">
                                                                            <p>Tootsie roll cake danish halvah powder
                                                                                Tootsie roll candy marshmallow cookie
                                                                                brownie apple pie pudding brownie
                                                                                chocolate bar. Jujubes gummi bears I
                                                                                love powder danish oat cake tart
                                                                                croissant.<a
                                                                                    href="javascript:void(0)">Reply</a>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="people-box">
                                                                    <div>
                                                                        <div class="people-image">
                                                                            <img src="/web/frontend/assets/images/review/3.jpg"
                                                                                class="img-fluid blur-up lazyload"
                                                                                alt="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="people-comment">
                                                                        <a class="name"
                                                                            href="javascript:void(0)">Gabrielle</a>
                                                                        <div class="date-time">
                                                                            <h6 class="text-content">21 May, 2022 at
                                                                                05.52 PM</h6>

                                                                            <div class="product-rating">
                                                                                <ul class="rating">
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"
                                                                                            class="fill"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"></i>
                                                                                    </li>
                                                                                    <li>
                                                                                        <i data-feather="star"></i>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>

                                                                        <div class="reply">
                                                                            <p>Biscuit chupa chups gummies powder I love
                                                                                sweet pudding jelly beans. Lemon drops
                                                                                marzipan apple pie gingerbread macaroon
                                                                                croissant cotton candy pastry wafer.
                                                                                Carrot cake halvah I love tart caramels
                                                                                pudding icing chocolate gummi bears.
                                                                                Gummi bears danish cotton candy muffin
                                                                                marzipan caramels awesome feel. <a
                                                                                    href="javascript:void(0)">Reply</a>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Product Left Sidebar End -->

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


<?php

$script = <<<JS
    function submitAddToCartForm(event) {
        event.preventDefault(); // Prevent the default form submission

        const form = document.getElementById('add-to-cart-form');
        const formData = new FormData(form); // Gather the form data

        fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest', // Indicate this is an AJAX request
                },
            })
            .then(response => response.json()) // Expecting JSON response
            .then(data => {
                if (data.success) {
                    // Save success message to sessionStorage
                    sessionStorage.setItem('toastrMessage', data.message || 'Product added to cart successfully!');
                    sessionStorage.setItem('toastrType', 'success');
                    
                    // Reload the page
                    location.reload();
                } else {
                    toastr.clear();
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true,
                        "timeOut": 5000
                    };
                    toastr.error(data.message || 'Failed to add product to cart.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.warning('Please login and try again.');
            });
    }

    // Check sessionStorage for Toastr message after page reload
    window.addEventListener('load', function () {
        const toastrMessage = sessionStorage.getItem('toastrMessage');
        const toastrType = sessionStorage.getItem('toastrType');
        
        if (toastrMessage && toastrType) {
            toastr.clear();
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "timeOut": 500
            };
            
            if (toastrType === 'success') {
                toastr.success(toastrMessage);
            } else if (toastrType === 'error') {
                toastr.error(toastrMessage);
            } else if (toastrType === 'warning') {
                toastr.warning(toastrMessage);
            }

            // Clear the message from sessionStorage
            sessionStorage.removeItem('toastrMessage');
            sessionStorage.removeItem('toastrType');
        }
    });
JS;

$this->registerJs($script, \yii\web\View::POS_END);
?>