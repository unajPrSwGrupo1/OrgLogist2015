<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Transporte */

$this->title = 'Create Transporte';
$this->params['breadcrumbs'][] = ['label' => 'Transportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transporte-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
