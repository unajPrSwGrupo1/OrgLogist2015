<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FuncTiporrhh */

$this->title = 'Update Func Tiporrhh: ' . ' ' . $model->idFunc;
$this->params['breadcrumbs'][] = ['label' => 'Func Tiporrhhs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idFunc, 'url' => ['view', 'id' => $model->idFunc]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="func-tiporrhh-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
