<?php

use app\models\ProductSubCategory;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\cms\models\ProductSubCategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Product Sub Categories';
$this->params['breadcrumbs'][] = $this->title;
?>



<!-- Container-fluid starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title d-sm-flex d-block">
                            <h5>product-sub-categorys List</h5>
                            <div class="right-options">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">import</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Export</a>
                                    </li>
                                    <li>
                                        <a class="btn btn-solid" href="<?= Url::to(['/cms/product-sub-category/create']) ?>">Add product-sub-category</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package theme-table table-product-sub-category" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Thumbnail</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if ($dataProvider->getCount() > 0): ?>

                                            <?php foreach ($dataProvider->getModels() as $index => $row): ?>
                                                <tr>
                                                    <td>
                                                        <div class="table-image">
                                                            <img src="/web/uploads/<?= $row->thumbnail ?>" class="img-fluid"
                                                                alt="">
                                                        </div>
                                                    </td>

                                                    <td><?= $row->name ?></td>

                                                    <td class="status-danger">
                                                        <span>Pending</span>
                                                    </td>

                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="<?= Url::to(['/cms/product-sub-category/view', 'id' => $row->id]) ?>">
                                                                    <i class="ri-eye-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="<?= Url::to(['/cms/product-sub-category/update', 'id' => $row->id]) ?>">
                                                                    <i class="ri-pencil-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="<?= Url::to(['/cms/product-sub-category/delete', 'id' => $row->id]) ?>" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalToggle">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="10" class="text-center">No data found</td>
                                            </tr>
                                        <?php endif; ?>
                                        <nav class="custome-pagination small-pagination">
                                            <?= \yii\bootstrap5\LinkPager::widget([
                                                'pagination' => $dataProvider->pagination,
                                                'options' => ['class' => 'pagination justify-content-center small-pagination'], // Add custom class
                                                'linkOptions' => ['class' => 'page-link'], // Style individual page links
                                                'activePageCssClass' => 'active', // Class for the active page
                                                'disabledPageCssClass' => 'disabled', // Class for disabled links
                                                'firstPageLabel' => 'Start', // Label for the start button
                                                'lastPageLabel' => 'End', // Label for the end button
                                                'prevPageLabel' => '<i class="fa-solid fa-angles-left"></i>', // Previous page icon
                                                'nextPageLabel' => '<i class="fa-solid fa-angles-right"></i>', // Next page icon
                                                'firstPageCssClass' => 'page-item', // Class for the start page container
                                                'lastPageCssClass' => 'page-item', // Class for the end page container
                                                'prevPageCssClass' => 'page-item', // Class for the previous page container
                                                'nextPageCssClass' => 'page-item', // Class for the next page container
                                                'pageCssClass' => 'page-item', // Class for each page container
                                                'maxButtonCount' => 5, // Number of visible page buttons
                                            ]); ?>
                                        </nav>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <div class="container-fluid">
        <!-- footer start-->
        <footer class="footer">
            <div class="row">
                <div class="col-md-12 footer-copyright text-center">
                    <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                </div>
            </div>
        </footer>
    </div>
</div>