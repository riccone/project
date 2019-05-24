<?php

use backend\models\Reestr;
use backend\models\Users;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Owners */
/* @var $form yii\widgets\ActiveForm */

$user = Users::find()->All();
$items = ArrayHelper::map($user,'id','firstname');

$plots = Reestr::find()->All();
$items2 = ArrayHelper::map($plots,'id','id');

$model->psprt_given_by = Yii::$app->security->decryptByKey(utf8_decode($model->psprt_given_by), 'key1');
$model->psprt_series = Yii::$app->security->decryptByKey(utf8_decode($model->psprt_series), 'key1');
?>

<div class="owners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'reestr_id')->widget(Select2::classname(), [
        'data' => $items2,
        'options' => ['placeholder' => 'Выберите реестра'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);?>

    <?=$form->field($model, 'user_id')->widget(Select2::classname(), [
        'data' => $items,
        'options' => ['placeholder' => 'Выберите пользователья'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);?>

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
