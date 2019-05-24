<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ReestrSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reestr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'plots_id') ?>

    <?= $form->field($model, 'cadastral_square') ?>

    <?= $form->field($model, 'cadastral_number') ?>

    <?php // echo $form->field($model, 'psprt_series') ?>

    <?php // echo $form->field($model, 'psprt_given_by') ?>

    <?php // echo $form->field($model, 'ownership_share') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
