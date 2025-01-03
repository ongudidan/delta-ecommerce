<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <?php

            use yii\helpers\Html;

            $statsCards = [
                [
                    'title' => 'Total Revenue',
                    'value' => '$6659',
                    'badge' => [
                        'class' => 'badge-light-primary',
                        'icon' => 'trending-up',
                        'text' => '8.5%'
                    ],
                    'icon' => 'ri-database-2-line',
                    'bgClass' => 'custome-1-bg'
                ],
                [
                    'title' => 'Total Orders',
                    'value' => '9856',
                    'badge' => [
                        'class' => 'badge-light-danger',
                        'icon' => 'trending-down',
                        'text' => '8.5%'
                    ],
                    'icon' => 'ri-shopping-bag-3-line',
                    'bgClass' => 'custome-2-bg'
                ],
                [
                    'title' => 'Total Products',
                    'value' => '893',
                    'badge' => [
                        'type' => 'link',
                        'class' => 'badge-light-secondary',
                        'text' => 'ADD NEW',
                        'url' => 'add-new-product.html'
                    ],
                    'icon' => 'ri-chat-3-line',
                    'bgClass' => 'custome-3-bg'
                ],
                [
                    'title' => 'Total Customers',
                    'value' => '4.6k',
                    'badge' => [
                        'class' => 'badge-light-success',
                        'icon' => 'trending-down',
                        'text' => '8.5%'
                    ],
                    'icon' => 'ri-user-add-line',
                    'bgClass' => 'custome-4-bg'
                ]
            ];
            ?>

            <!-- chart card section start -->
            <?php foreach ($statsCards as $card): ?>
                <div class="col-sm-6 col-xxl-3 col-lg-6">
                    <div class="main-tiles border-5 border-0 card-hover card o-hidden">
                        <div class="<?= $card['bgClass'] ?> b-r-4 card-body">
                            <div class="media align-items-center static-top-widget">
                                <div class="media-body p-0">
                                    <span class="m-0"><?= $card['title'] ?></span>
                                    <h4 class="mb-0 counter"><?= $card['value'] ?>
                                        <?php if (isset($card['badge'])): ?>
                                            <?php if (isset($card['badge']['type']) && $card['badge']['type'] === 'link'): ?>
                                                <a href="<?= $card['badge']['url'] ?>" class="badge <?= $card['badge']['class'] ?> grow">
                                                    <?= $card['badge']['text'] ?>
                                                </a>
                                            <?php else: ?>
                                                <span class="badge <?= $card['badge']['class'] ?> grow">
                                                    <i data-feather="<?= $card['badge']['icon'] ?>"></i><?= $card['badge']['text'] ?>
                                                </span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </h4>
                                </div>
                                <div class="align-self-center text-center">
                                    <i class="<?= $card['icon'] ?>"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- chart card section End -->
            <div class="col-12">
                <div class="card o-hidden card-hover">
                    <div class="card-header border-0 pb-1">
                        <div class="card-header-title p-0">
                            <h4>Category</h4>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="category-slider no-arrow">
                            <?php foreach ($categories as $category): ?>
                                <div>
                                    <div class="dashboard-category">
                                        <a href="javascript:void(0)" class="category-image">
                                            <img src="/web/uploads/<?= $category->thumbnail ?>" class="img-fluid" alt="<?= $category['name'] ?>">
                                        </a>
                                        <a href="javascript:void(0)" class="category-name">
                                            <h6><?= $category['name'] ?></h6>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>

            <!-- chart card section End -->


            <!-- Earning chart star-->
            <div class="col-xl-6">
                <div class="card o-hidden card-hover">
                    <div class="card-header border-0 pb-1">
                        <div class="card-header-title">
                            <h4>Revenue Report</h4>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div id="report-chart"></div>
                    </div>
                </div>
            </div>
            <!-- Earning chart  end-->


            <!-- Best Selling Product Start -->
            <div class="col-xl-6 col-md-12">
                <div class="card o-hidden card-hover">
                    <div class="card-header card-header-top card-header--2 px-0 pt-0">
                        <div class="card-header-title">
                            <h4>Best Selling Product</h4>
                        </div>
                        <div class="best-selling-box d-sm-flex d-none">
                            <span>Short By:</span>
                            <div class="dropdown">
                                <button class="btn p-0 dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    data-bs-auto-close="true">Today</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div>
                            <div class="table-responsive">
                                <table class="best-selling-table w-image table border-0">
                                    <tbody>
                                        <?php foreach ($bestSellers as $product): ?>
                                            <tr>
                                                <td>
                                                    <div class="best-product-box">
                                                        <div class="product-image">
                                                            <img src="/web/uploads/<?= $product->thumbnail ?>" class="img-fluid" alt="Product">
                                                        </div>
                                                        <div class="product-name">
                                                            <h5><?= Html::encode($product->name) ?></h5>
                                                            <h6><?= Yii::$app->formatter->asDate($product->created_at) ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Price</h6>
                                                        <h5>Ksh. <?= number_format($product->selling_price, 2) ?></h5>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Orders</h6>
                                                        <h5><?= $product->order_count ?></h5>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Stock</h6>
                                                        <h5><?= $product->stock ?></h5>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product-detail-box">
                                                        <h6>Amount</h6>
                                                        <h5>$<?= number_format($product->total_amount ?? 0, 2) ?></h5>
                                                    </div>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Best Selling Product End -->



            <!-- Recent orders start-->
            <div class="col-xl-6">
                <div class="card o-hidden card-hover">
                    <div class="card-header card-header-top card-header--2 px-0 pt-0">
                        <div class="card-header-title">
                            <h4>Recent Orders</h4>
                        </div>

                        <div class="best-selling-box d-sm-flex d-none">
                            <span>Short By:</span>
                            <div class="dropdown">
                                <button class="btn p-0 dropdown-toggle" type="button"
                                    id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                    data-bs-auto-close="true">Today</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <div>
                            <div class="table-responsive">
                                <table class="best-selling-table table border-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="best-product-box">
                                                    <div class="product-name">
                                                        <h5>Aata Buscuit</h5>
                                                        <h6>#64548</h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Date Placed</h6>
                                                    <h5>5/1/22</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Price</h6>
                                                    <h5>$250.00</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Order Status</h6>
                                                    <h5>Completed</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Payment</h6>
                                                    <h5 class="text-danger">Unpaid</h5>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="best-product-box">
                                                    <div class="product-name">
                                                        <h5>Aata Buscuit</h5>
                                                        <h6>26-08-2022</h6>
                                                    </div>
                                                </div>
                                            </td>


                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Date Placed</h6>
                                                    <h5>5/1/22</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Price</h6>
                                                    <h5>$250.00</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Order Status</h6>
                                                    <h5>Completed</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Payment</h6>
                                                    <h5 class="theme-color">Paid</h5>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="best-product-box">
                                                    <div class="product-name">
                                                        <h5>Aata Buscuit</h5>
                                                        <h6>26-08-2022</h6>
                                                    </div>
                                                </div>
                                            </td>


                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Date Placed</h6>
                                                    <h5>5/1/22</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Price</h6>
                                                    <h5>$250.00</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Order Status</h6>
                                                    <h5>Completed</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Payment</h6>
                                                    <h5 class="theme-color">Paid</h5>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="best-product-box">
                                                    <div class="product-name">
                                                        <h5>Aata Buscuit</h5>
                                                        <h6>26-08-2022</h6>
                                                    </div>
                                                </div>
                                            </td>


                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Date Placed</h6>
                                                    <h5>5/1/22</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Price</h6>
                                                    <h5>$250.00</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Order Status</h6>
                                                    <h5>Completed</h5>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="product-detail-box">
                                                    <h6>Payment</h6>
                                                    <h5 class="theme-color">Paid</h5>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Recent orders end-->

            <!-- Earning chart star-->
            <div class="col-xl-6">
                <div class="card o-hidden card-hover">
                    <div class="card-header border-0 mb-0">
                        <div class="card-header-title">
                            <h4>Earning</h4>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div id="bar-chart-earning"></div>
                    </div>
                </div>
            </div>
            <!-- Earning chart end-->


            <!-- Transactions start-->
            <div class="col-xxl-4 col-md-6">
                <div class="card o-hidden card-hover">
                    <div class="card-header border-0">
                        <div class="card-header-title">
                            <h4>M-PESA Transactions</h4>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div>
                            <div class="table-responsive">
                                <table class="user-table transactions-table table border-0">
                                    <tbody>
                                        <?php foreach ($transactions as $transaction): ?>
                                            <tr>
                                                <td class="td-color-1">
                                                    <div class="transactions-icon">
                                                        <i class="ri-smartphone-line"></i>
                                                    </div>
                                                    <div class="transactions-name">
                                                        <h6><?= $transaction->phone ?></h6>
                                                        <p><?= $transaction->mpesa_receipt_number ?></p>
                                                    </div>
                                                </td>
                                                <td class="success">
                                                    +<?= number_format($transaction->amount, 2) ?> KES
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Transactions end-->


            <!-- visitors chart start-->
            <div class="col-xxl-4 col-md-6">
                <div class="h-100">
                    <div class="card o-hidden card-hover">
                        <div class="card-header border-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="card-header-title">
                                    <h4>Visitors</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="pie-chart">
                                <div id="pie-chart-visitors"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- visitors chart end-->

        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- footer start-->
    <?= $this->render('/layouts/components/_footer') ?>

    <!-- footer End-->
</div>