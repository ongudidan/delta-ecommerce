<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'p-3'],
]); ?>

<!-- log in section start -->
<section class="log-in-section background-image-2 section-b-space">
    <div class="container-fluid-lg w-100">
        <div class="row">
            <!-- <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                <div class="image-contain">
                    <img src="/web/frontend/assets/images/inner-page/log-in.png" class="img-fluid" alt="">
                </div>
            </div> -->

            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="log-in-box">
                    <div class="log-in-title">
                        <h3>Welcome To Fastkart</h3>
                        <h4>Log In Your Account</h4>
                    </div>

                    <div class="input-box">
                        <form class="row g-4">
                            <div class="col-12">
                                <div class="form-floating theme-form-floating log-in-form">
                                    <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => 'form-control', 'placeholder' => 'name@example.com'])->label('Email', ['class' => 'form-label']) ?>
                                    <!-- <label for="email">Email Address</label> -->
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating theme-form-floating log-in-form">
                                    <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Password'])->label('Password', ['class' => 'form-label']) ?>

                                    <!-- <label for="password">Password</label> -->
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="forgot-box">
                                    <div class="form-check ps-0 m-0 remember-box">
                                        <?= $form->field($model, 'rememberMe')->checkbox([
                                            'template' => "<div class=\"form-check\">{input} {label}</div>\n",
                                            'class' => 'form-check-input'
                                        ])->label('Keep me logged in', ['class' => 'form-check-label text-secondary']) ?>
                                        <!-- <label class="form-check-label" for="flexCheckDefault">Remember me</label> -->
                                    </div>
                                    <a href="#" class="forgot-password">Forgot Password?</a>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-animation w-100 justify-content-center" type="submit">Log
                                    In</button>
                            </div>
                        </form>
                    </div>


                    <div class="sign-up-box">
                        <h4>Don't have an account?</h4>
                        <a href="<?= Url::to(['site/signup']) ?>">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- log in section end -->

<?php ActiveForm::end(); ?>
