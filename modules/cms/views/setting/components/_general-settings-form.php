 <?php

    use yii\bootstrap5\ActiveForm;
    use yii\helpers\Html;

    ?>

 <?php $form = ActiveForm::begin([
        'id' => 'general-settings-form',
        'options' => [
            'class' => 'theme-form theme-form-2 mega-form',
            'enctype' => 'multipart/form-data'
        ],
    ]); ?>
 <div class="card">
     <div class="card-body">
         <div class="title-header option-title">
             <h5>General Settings</h5>
         </div>
         <?php $form = ActiveForm::begin([
                'id' => 'general-settings-form',
                'options' => [
                    'class' => 'theme-form theme-form-2 mega-form',
                    'enctype' => 'multipart/form-data'
                ],
            ]); ?>

         <div class="row">
             <!-- Column 1 -->
             <div class="col-md-6">
                 <div class="mb-4">
                     <?= Html::label('Phone Number', 'phone', ['class' => 'form-label-title']) ?>
                     <?= $form->field($model, 'phone', ['options' => ['tag' => false]])
                            ->textInput(['class' => 'form-control', 'placeholder' => 'Business Phone Number'])
                            ->label(false) ?>
                 </div>
                 <div class="mb-4">
                     <?= Html::label('Address', 'address', ['class' => 'form-label-title']) ?>
                     <?= $form->field($model, 'address', ['options' => ['tag' => false]])
                            ->textInput(['class' => 'form-control', 'placeholder' => 'Business Address'])
                            ->label(false) ?>
                 </div>
                 <div class="mb-4">
                     <?= Html::label('Twitter', 'twitter', ['class' => 'form-label-title']) ?>
                     <?= $form->field($model, 'twitter', ['options' => ['tag' => false]])
                            ->textInput(['class' => 'form-control', 'placeholder' => 'Business Twitter Username'])
                            ->label(false) ?>
                 </div>
                 <div class="mb-4">
                     <?= Html::label('Instagram', 'instagram', ['class' => 'form-label-title']) ?>
                     <?= $form->field($model, 'instagram', ['options' => ['tag' => false]])
                            ->textInput(['class' => 'form-control', 'placeholder' => 'Business Instagram Username'])
                            ->label(false) ?>
                 </div>
                 <div class="mb-4">
                     <?= Html::label('Footer Title', 'footer_title', ['class' => 'form-label-title']) ?>
                     <?= $form->field($model, 'footer_title', ['options' => ['tag' => false]])
                            ->textInput(['class' => 'form-control', 'placeholder' => 'Business Footer Title'])
                            ->label(false) ?>
                 </div>
             </div>

             <!-- Column 2 -->
             <div class="col-md-6">
                 <div class="mb-4">
                     <?= Html::label('Email', 'email', ['class' => 'form-label-title']) ?>
                     <?= $form->field($model, 'email', ['options' => ['tag' => false]])
                            ->textInput(['class' => 'form-control', 'placeholder' => 'Business Email'])
                            ->label(false) ?>
                 </div>
                 <div class="mb-4">
                     <?= Html::label('Facebook', 'facebook', ['class' => 'form-label-title']) ?>
                     <?= $form->field($model, 'facebook', ['options' => ['tag' => false]])
                            ->textInput(['class' => 'form-control', 'placeholder' => 'Business Facebook Username'])
                            ->label(false) ?>
                 </div>
                 <div class="mb-4">
                     <?= Html::label('YouTube', 'youtube', ['class' => 'form-label-title']) ?>
                     <?= $form->field($model, 'youtube', ['options' => ['tag' => false]])
                            ->textInput(['class' => 'form-control', 'placeholder' => 'Business YouTube Username'])
                            ->label(false) ?>
                 </div>
                 <div class="mb-4">
                     <?= Html::label('Footer Description', 'description', ['class' => 'form-label-title']) ?>
                     <?= $form->field($model, 'description', ['options' => ['tag' => false]])
                            ->textarea(['class' => 'form-control', 'placeholder' => 'Site Footer Description'])
                            ->label(false) ?>
                 </div>
             </div>
         </div>

         <div class="text-center justify-content-end flex-wrap d-flex">
             <?= Html::submitButton('Submit', [
                    'class' => 'btn btn-primary',
                    'form' => 'general-settings-form', // Links the button to the form by its ID
                ]) ?>
         </div>

         <?php ActiveForm::end(); ?>
     </div>
 </div>

 <?php ActiveForm::end() ?>