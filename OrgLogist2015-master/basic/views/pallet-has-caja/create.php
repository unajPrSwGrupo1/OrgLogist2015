<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PalletHasCaja */

$this->title = 'Create Pallet Has Caja';
$this->params['breadcrumbs'][] = ['label' => 'Pallet Has Cajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pallet-has-caja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
