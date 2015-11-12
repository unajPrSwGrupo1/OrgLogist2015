<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tipocaja */

$this->title = 'Create Tipocaja';
$this->params['breadcrumbs'][] = ['label' => 'Tipocajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipocaja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
