<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StageareaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stageareas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stagearea-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Stagearea', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idStageArea',
            'TipoStageArea_idTipoStageArea',
            'loadlimit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
