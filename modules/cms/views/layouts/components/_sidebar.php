<?php

use app\models\SiteInfo;
use yii\helpers\Url;

$logo = SiteInfo::find()->one()->logo ?? '';

// Sidebar configuration array
$sidebarItems = [
    [
        'title' => 'Dashboard',
        'icon' => 'ri-home-line',
        'url' => ['/cms/default/index'],
        'children' => [],
    ],
    [
        'title' => 'Orders',
        'icon' => 'ri-store-3-line',
        'url' => 'javascript:void(0)',
        'children' => [
            ['title' => 'Orders', 'url' => ['/cms/order/index']],
            // ['title' => 'Add New order', 'url' => ['/cms/order/create']],
        ],
    ],
    [
        'title' => 'Product',
        'icon' => 'ri-store-3-line',
        'url' => 'javascript:void(0)',
        'children' => [
            ['title' => 'Products', 'url' => ['/cms/product/index']],
            ['title' => 'Add New Product', 'url' => ['/cms/product/create']],
        ],
    ],
    [
        'title' => 'Category',
        'icon' => 'ri-list-check-2',
        'url' => 'javascript:void(0)',
        'children' => [
            ['title' => 'Category List', 'url' => ['/cms/product-category/index']],
            ['title' => 'Add New Category', 'url' => ['/cms/product-category/create']],
        ],
    ],
    // [
    //     'title' => 'sub-category',
    //     'icon' => 'ri-list-check-2',
    //     'url' => 'javascript:void(0)',
    //     'children' => [
    //         ['title' => 'sub-category List', 'url' => ['/cms/product-sub-category/index']],
    //         ['title' => 'Add New sub-category', 'url' => ['/cms/product-sub-category/create']],
    //     ],
    // ],
    // [
    //     'title' => 'Brands',
    //     'icon' => 'ri-list-check-2',
    //     'url' => 'javascript:void(0)',
    //     'children' => [
    //         ['title' => 'brand List', 'url' => ['/cms/brand/index']],
    //         ['title' => 'Add New brand', 'url' => ['/cms/brand/create']],
    //     ],
    // ],
    // [
    //     'title' => 'Units',
    //     'icon' => 'ri-list-check-2',
    //     'url' => 'javascript:void(0)',
    //     'children' => [
    //         ['title' => 'unit List', 'url' => ['/cms/unit/index']],
    //         ['title' => 'Add New unit', 'url' => ['/cms/unit/create']],
    //     ],
    // ],
    [
        'title' => 'Settings',
        'icon' => 'ri-list-check-2',
        'url' => 'javascript:void(0)',
        'children' => [
            ['title' => 'General Site Settings', 'url' => ['/cms/setting/index']],
            // ['title' => 'Add New unit', 'url' => ['/cms/unit/create']],
        ],
    ],
];
?>

<div class="sidebar-wrapper">
    <div id="sidebarEffect"></div>
    <div>
        <div class="logo-wrapper logo-wrapper-center">
            <a href="<?= Url::to(['/cms/default/index']) ?>" data-bs-original-title="" title="">
                <img class="img-fluid for-white" src="/web/uploads/<?= $logo ?? '' ?>" alt="logo">
            </a>
            <div class="back-btn">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="toggle-sidebar">
                <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
            </div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="<?= Url::to(['/cms/default/index']) ?>">
                <img class="img-fluid main-logo main-white" src="/web/uploads/<?= $logo ?? '' ?>" alt="logo">
                <img class="img-fluid main-logo main-dark" src="/web/uploads/<?= $logo ?? '' ?>" alt="logo">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"></li>

                    <?php foreach ($sidebarItems as $item): ?>
                        <li class="sidebar-list">
                            <a
                                class="sidebar-link sidebar-title <?= empty($item['children']) ? 'link-nav' : 'linear-icon-link' ?>"
                                href="<?= empty($item['children']) ? Url::to($item['url']) : 'javascript:void(0)' ?>">
                                <i class="<?= $item['icon'] ?>"></i>
                                <span><?= $item['title'] ?></span>
                            </a>

                            <?php if (!empty($item['children'])): ?>
                                <ul class="sidebar-submenu">
                                    <?php foreach ($item['children'] as $child): ?>
                                        <li>
                                            <a href="<?= Url::to($child['url']) ?>"><?= $child['title'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </nav>
    </div>
</div>