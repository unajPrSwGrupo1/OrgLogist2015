<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pallet */

$this->title = 'Create Pallet';
$this->params['breadcrumbs'][] = ['label' => 'Pallets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pallet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
