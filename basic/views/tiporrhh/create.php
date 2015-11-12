<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tiporrhh */

$this->title = 'Create Tiporrhh';
$this->params['breadcrumbs'][] = ['label' => 'Tiporrhhs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiporrhh-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
