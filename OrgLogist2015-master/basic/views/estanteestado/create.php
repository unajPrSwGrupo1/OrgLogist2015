<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Estanteestado */

$this->title = 'Create Estanteestado';
$this->params['breadcrumbs'][] = ['label' => 'Estanteestados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estanteestado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
