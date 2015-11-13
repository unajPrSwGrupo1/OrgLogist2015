<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Recepcion */

$this->title = 'Create Recepcion';
$this->params['breadcrumbs'][] = ['label' => 'Recepcions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recepcion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
