<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rrhh */

$this->title = 'Create Rrhh';
$this->params['breadcrumbs'][] = ['label' => 'Rrhhs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rrhh-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
