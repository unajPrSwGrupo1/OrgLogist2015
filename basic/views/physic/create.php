<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Physic */

$this->title = 'Create Physic';
$this->params['breadcrumbs'][] = ['label' => 'Physics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="physic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
