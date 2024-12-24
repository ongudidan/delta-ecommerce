<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var yii\widgets\ActiveForm $form */
?>



<div class="page-body">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'theme-form theme-form-2 mega-form']
    ]); ?>

    <!-- New Product Add Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">

                        <?= $this->render('components/form/_product-info', ['model' => $model, 'form' => $form]) ?>

                        <?= $this->render('components/form/_description', ['model' => $model, 'form' => $form]) ?>


                        <?= $this->render('components/form/_images', ['model' => $model, 'form' => $form]) ?>

                        <?php //echo $this->render('components/form/_product-variations', ['model' => $model, 'form' => $form]) 
                        ?>


                        <?= $this->render('components/form/_product-price', ['model' => $model, 'form' => $form]) ?>
                        
                        <?= Html::submitButton('Save', ['class' => 'btn btn-primary ms-auto mt-4']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <!-- New Product Add End -->
</div>