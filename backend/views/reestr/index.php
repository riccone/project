<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReestrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reestrs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reestr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Reestr', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'plots_id',
            'cadastral_square',
            'cadastral_number',
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
            //'ownership_share',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
