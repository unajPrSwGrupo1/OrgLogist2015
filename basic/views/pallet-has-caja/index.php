<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PalletHasCajaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pallet Has Cajas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pallet-has-caja-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pallet Has Caja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Pallet_idPallet',
            'Caja_idCaja',
            'descript',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
