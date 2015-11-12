<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tiporrhhs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiporrhh-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tiporrhh', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTipoRRHH',
            'Tipo',
            'descript',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
