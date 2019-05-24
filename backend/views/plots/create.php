<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Plots */

$this->title = 'Create Plots';
$this->params['breadcrumbs'][] = ['label' => 'Plots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plots-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
