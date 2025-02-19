<?php

use app\models\ContactInfo;
use app\models\SiteInfo;
use yii\helpers\Url;

$contactInfo = ContactInfo::find()->one() ?? '';
$logo = SiteInfo::find()->one()->logo ?? '';

?>

<?php
$links = [
    ['url' => 'site/index', 'label' => 'Home'],
    ['url' => 'site/about', 'label' => 'About Us'],
    ['url' => 'site/contact', 'label' => 'Contact Us']
];

$helpLinks = [
    ['url' => 'user-dashboard/orders', 'label' => 'Your Order'],
    ['url' => 'user-dashboard/index', 'label' => 'Your Account'],
    ['url' => 'site/products', 'label' => 'Search'],
];

$contacts = [
    ['icon' => 'phone', 'title' => 'Hotline 24/7 :', 'detail' => $contactInfo->phone ?? ''],
    ['icon' => 'mail', 'title' => 'Email Address :', 'detail' => $contactInfo->email ?? ''],
];

$socialLinks = [
    ['url' => isset($contactInfo->facebook) ? 'https://www.facebook.com/' . $contactInfo->facebook : '', 'icon' => 'fa-facebook-f'],
    ['url' => isset($contactInfo->twitter) ? 'https://twitter.com/' . $contactInfo->twitter : '', 'icon' => 'fa-twitter'],
    ['url' => isset($contactInfo->instagram) ? 'https://www.instagram.com/' . $contactInfo->instagram : '', 'icon' => 'fa-instagram'],
];


?>


<footer class="section-t-space">
    <div class="container-fluid-lg">

        <div class="main-footer section-b-space section-t-space">
            <div class="row g-md-4 g-3">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-logo">
                        <div class="theme-logo">
                            <a href="index.html">
                                <img src="/web/uploads/<?= $logo ?? '' ?>" class="blur-up lazyload" alt="" />
                            </a>
                        </div>

                        <div class="footer-logo-contain">
                            <p>
                                <?= $contactInfo->description ?? '' ?>
                            </p>

                            <ul class="address">
                                <li>
                                    <i data-feather="home"></i>
                                    <a href="javascript:void(0)"><?= $contactInfo->address ?? '' ?></a>
                                </li>
                                <li>
                                    <i data-feather="mail"></i>
                                    <a href="javascript:void(0)"><?= $contactInfo->email ?? '' ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-2 col-sm-3">
                    <div class="footer-title">
                        <h4>Useful Links</h4>
                    </div>

                    <div class="footer-contain">
                        <ul>
                            <?php foreach ($links as $link) {
                                echo '<li><a href="' . Url::to([$link['url']]) . '" class="text-content">' . $link['label'] . '</a></li>';
                            } ?>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-2 col-sm-3">
                    <div class="footer-title">
                        <h4>Help Center</h4>
                    </div>

                    <div class="footer-contain">
                        <ul>
                            <?php foreach ($helpLinks as $link) {
                                echo '<li><a href="' .  Url::to([$link['url']]) . '" class="text-content">' . $link['label'] . '</a></li>';
                            } ?>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-title">
                        <h4>Contact Us</h4>
                    </div>

                    <div class="footer-contact">
                        <ul>
                            <?php foreach ($contacts as $contact) { ?>
                                <li>
                                    <div class="footer-number">
                                        <i data-feather="<?= $contact['icon'] ?>"></i>
                                        <div class="contact-number">
                                            <h6 class="text-content"><?= $contact['title'] ?> :</h6>
                                            <h5><?= $contact['detail'] ?></h5>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="sub-footer section-small-space">
            <div class="reserve">
                <h6 class="text-content">©<?= $contactInfo->footer_title ?? '' ?></h6>
            </div>
            <!-- 
            <div class="payment">
                <img src="/web/frontend/assets/images/payment/1.png" class="blur-up lazyload" alt="" />
            </div> -->

            <div class="social-link">
                <h6 class="text-content">Stay connected :</h6>
                <ul>
                    <?php foreach ($socialLinks as $link) { ?>
                        <li>
                            <a href="<?= $link['url'] ?>" target="_blank">
                                <i class="fa-brands <?= $link['icon'] ?>"></i>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</footer>