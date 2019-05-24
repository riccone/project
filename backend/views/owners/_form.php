<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Owners */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="owners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reestr_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'ownership_share')->textInput() ?>

    <?= $form->field($model, 'psprt_series')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'psprt_given_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cadastral_square')->textInput() ?>

    <?= $form->field($model, 'cadastral_number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
