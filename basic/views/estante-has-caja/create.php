<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstanteHasCaja */

$this->title = 'Create Estante Has Caja';
$this->params['breadcrumbs'][] = ['label' => 'Estante Has Cajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estante-has-caja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
