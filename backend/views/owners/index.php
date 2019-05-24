<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\OwnersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Owners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="owners-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Owners', ['create'], ['class' => 'btn btn-success']) ?>  <?= Html::a('Encode db table', ['encode'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'reestr_id',
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
            //'phone',
            //'email:email',
            //'cadastral_square',
            //'cadastral_number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
