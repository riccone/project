<?php

use backend\models\Plots;
use backend\models\Users;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Reestr */
/* @var $form yii\widgets\ActiveForm */

$user = Users::find()->All();
$items = ArrayHelper::map($user,'id','firstname');

$plots = Plots::find()->All();
$items2 = ArrayHelper::map($plots,'id','name');
?>

<div class="reestr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => $items,
        'options' => ['placeholder' => 'Выберите пользователья'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);?>

    <?= $form->field($model, 'plots_id')->textInput() ?>

    <?=$form->field($model, 'plots_id')->widget(Select2::classname(), [
        'data' => $items2,
        'options' => ['placeholder' => 'Выберите участок'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);?>

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
