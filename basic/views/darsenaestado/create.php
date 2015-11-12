<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Darsenaestado */

$this->title = 'Create Darsenaestado';
$this->params['breadcrumbs'][] = ['label' => 'Darsenaestados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="darsenaestado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
