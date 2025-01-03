<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ContactInfo $model */

$this->title = 'Create Contact Info';
$this->params['breadcrumbs'][] = ['label' => 'Contact Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
