<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Stagearea */

$this->title = 'Create Stagearea';
$this->params['breadcrumbs'][] = ['label' => 'Stageareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stagearea-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
