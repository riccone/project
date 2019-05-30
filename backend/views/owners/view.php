<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Owners */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Owners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="owners-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'ownership_share',
            [
                'attribute' => 'psprt_series',
                'value' => function ($model) {
                    return Yii::$app->security->decryptByKey(utf8_decode($model->psprt_series), 'key1');

                },
            ],
            [
                'attribute' => 'psprt_given_by',
                'value' => function ($model) {
                    return Yii::$app->security->decryptByKey(utf8_decode($model->psprt_given_by), 'key1');

                },
            ],
            'phone',
            'email:email',
            'cadastral_square',
            'cadastral_number',
            'plots_id',
            'role',
        ],
    ]) ?>

</div>
