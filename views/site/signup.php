<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \app\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>


<!-- sign up section start -->
<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

<section class="log-in-section section-b-space">
    <div class="container-fluid-lg w-100">
        <div class="row">
            <!-- <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                <div class="image-contain">
                    <img src="../assets/images/inner-page/sign-up.png" class="img-fluid" alt="">
                </div>
            </div> -->

            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="log-in-box">
                    <div class="log-in-title">
                        <h3>Welcome To Fastkart</h3>
                        <h4>Create New Account</h4>
                    </div>

                    <div class="input-box">
                        <form class="row g-4">
                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                                    <!-- <label for="fullname">Full Name</label> -->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    <?= $form->field($model, 'email') ?>
                                    <!-- <label for="email">Email Address</label> -->
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    <?= $form->field($model, 'phone_no') ?>
                                    <!-- <label for="email">Email Address</label> -->
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating theme-form-floating">
                                    <?= $form->field($model, 'password')->passwordInput() ?>

                                    <!-- <label for="password">Password</label> -->
                                </div>
                            </div>

                            <!-- <div class="col-12">
                                <div class="forgot-box">
                                    <div class="form-check ps-0 m-0 remember-box">
                                        <input class="checkbox_animated check-box" type="checkbox"
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">I agree with
                                            <span>Terms</span> and <span>Privacy</span></label>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-12">
                                <!-- <button class="btn btn-animation w-100" type="submit">Sign Up</button> -->
                                <?= Html::submitButton('Signup', ['class' => 'btn btn-animation w-100', 'name' => 'signup-button']) ?>

                            </div>
                        </form>
                    </div>

                    <div class="sign-up-box">
                        <h4>Already have an account?</h4>
                        <a href="<?= Url::to(['site/login']) ?>">Log In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php ActiveForm::end(); ?>

<!-- log in section end -->