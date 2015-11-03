<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Loadlimit */

$this->title = 'Update Loadlimit: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Loadlimits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="loadlimit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
