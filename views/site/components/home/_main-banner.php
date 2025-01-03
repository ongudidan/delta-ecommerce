<?php

use app\models\MainBanner;

$mainBanner = MainBanner::find()->one();
$banner1 = \app\models\Banner1::find()->one();
$banner2 = \app\models\Banner2::find()->one();
?>
<section class="home-section pt-2">
    <div class="container-fluid-lg">
        <div class="row g-4">
            <div class="col-xl-8 ratio_65">
                <div class="home-contain h-100" style="position: relative; overflow: hidden;">
                    <!-- Local video background -->
                    <video
                        autoplay
                        muted
                        loop
                        playsinline
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;  object-fit: cover; pointer-events: none;">
                        <source src="/web/uploads/videos/videoplayback.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                    <!-- Content over video -->
                    <div class="home-detail p-center-left w-75" style="position: relative; ">
                        <div>
                            <h6>Exclusive offer <span><?= $mainBanner->offer_percentage ?? '' ?>% Off</span></h6>
                            <h1 class="text-uppercase">
                                <?php if (!empty($mainBanner->title)): ?>
                                    <?php
                                    $words = explode(' ', $mainBanner->title);
                                    $lastWord = array_pop($words); // Get the last word
                                    $remainingTitle = implode(' ', $words); // Remaining words
                                    ?>
                                    <?= $remainingTitle ?> <span class="daily"><?= $lastWord ?></span>
                                <?php else: ?>
                                    <!-- If no title is set -->
                                    <span> </span>
                                <?php endif; ?>
                            </h1>

                            <p class="w-75 d-none d-sm-block">
                                <?= $mainBanner->description ?? '' ?>
                            </p>
                            <!-- <button onclick="location.href = '<?= $mainBanner->product_link ?? '#' ?>';"
                                class="btn btn-animation mt-xxl-4 mt-2 home-button mend-auto">
                                Shop Now <i class="fa-solid fa-right-long icon"></i>
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-4 ratio_65">
                <div class="row g-4">
                    <div class="col-xl-12 col-md-6 d-none d-md-block"> <!-- Hidden on mobile, shown from medium screens upwards -->
                        <div class="home-contain">
                            <!-- <img src="/web/uploads/banner/2.jpg" class="bg-img blur-up lazyload" alt="" /> -->
                            <img src="/web/uploads/<?= $banner1->image ?? 'banner/2.jpg' ?>" class="bg-img blur-up lazyload" alt="" />

                            <div class="home-detail p-center-left home-p-sm w-75">
                                <div>
                                    <h2 class="mt-0 text-danger">
                                        <?= $banner1->offer_percentage ?? '' ?>% <span class="discount text-title">OFF</span>
                                    </h2>
                                    <h3 class="theme-color"><?= $banner1->title ?? '' ?></h3>
                                    <p class="w-75"><?= $banner1->description ?? '' ?></p>
                                    <a href="<?= $banner1->product_link ?? '#' ?>" class="shop-button">Shop Now <i
                                            class="fa-solid fa-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-md-6 d-none d-md-block"> <!-- Hidden on mobile, shown from medium screens upwards -->
                        <div class="home-contain">
                            <!-- <img src="/web/uploads/banner/3.jpg" class="bg-img blur-up lazyload" alt="" /> -->
                            <img src="/web/uploads/<?= $banner2->image ?? 'banner/3.jpg' ?>" class="bg-img blur-up lazyload" alt="" />

                            <div class="home-detail p-center-left home-p-sm w-75">
                                <div>
                                    <h2 class="mt-0 text-danger">
                                        <?= $banner2->offer_percentage ?? '' ?>% <span class="discount text-title">OFF</span>
                                    </h2>
                                    <h3 class="theme-color"><?= $banner2->title ?? '' ?></h3>
                                    <p class="w-75"><?= $banner2->description ?? '' ?></p>
                                    <a href="<?= $banner2->product_link ?? '#' ?>" class="shop-button">Shop Now <i
                                            class="fa-solid fa-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>