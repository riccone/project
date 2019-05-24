<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reestr */

$this->title = 'Create Reestr';
$this->params['breadcrumbs'][] = ['label' => 'Reestrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reestr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
