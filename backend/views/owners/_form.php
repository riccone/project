<?php

use backend\models\Plots;
use backend\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Owners */
/* @var $form yii\widgets\ActiveForm */

$users = User::find()->All();
$items1 = ArrayHelper::map($users,'id','username');

$plots = Plots::find()->All();
$items2 = ArrayHelper::map($plots,'id','name');

$model->address = Yii::$app->security->decryptByKey(utf8_decode($model->address), 'key1');

?>

<div class="owners-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'user')->widget(Select2::classname(), [
        'data' => $items1,
        'options' => ['placeholder' => 'Выберите Пользователь'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);?>


    <?=$form->field($model, 'plot')->widget(Select2::classname(), [
        'data' => $items2,
        'options' => ['placeholder' => 'Выберите участок'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
