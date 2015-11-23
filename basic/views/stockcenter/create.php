<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Stockcenter */

$this->title = 'Create Stockcenter';
$this->params['breadcrumbs'][] = ['label' => 'Stockcenters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stockcenter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
