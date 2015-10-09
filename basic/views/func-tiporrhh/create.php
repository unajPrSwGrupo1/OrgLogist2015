<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FuncTiporrhh */

$this->title = 'Create Func Tiporrhh';
$this->params['breadcrumbs'][] = ['label' => 'Func Tiporrhhs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="func-tiporrhh-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
