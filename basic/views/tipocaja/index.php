<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipocajaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipocajas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipocaja-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipocaja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTipoCaja',
            'Tipo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
