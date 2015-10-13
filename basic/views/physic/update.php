<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Physic */

$this->title = 'Update Physic: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Physics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="physic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
