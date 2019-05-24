<?php

use backend\models\Region;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\Plots */
/* @var $form yii\widgets\ActiveForm */

$regions = Region::find()->All();
$items = ArrayHelper::map($regions,'id','name');
?>

<div class="plots-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'region_id')->widget(Select2::classname(), [
        'data' => $items,
        'options' => ['placeholder' => 'Выберите региона'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
