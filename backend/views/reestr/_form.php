<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Reestr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reestr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'plots_id')->textInput() ?>

    <?= $form->field($model, 'cadastral_square')->textInput() ?>

    <?= $form->field($model, 'cadastral_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'psprt_series')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'psprt_given_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ownership_share')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
