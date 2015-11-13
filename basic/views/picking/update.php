<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Picking */

$this->title = 'Update Picking: ' . ' ' . $model->num_picking;
$this->params['breadcrumbs'][] = ['label' => 'Pickings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->num_picking, 'url' => ['view', 'id' => $model->num_picking]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="picking-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
