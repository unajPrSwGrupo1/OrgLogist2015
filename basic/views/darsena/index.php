<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DarsenaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Darsenas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="darsena-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Darsena', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDarsena',
            'Nombre',
            'Descripcion',
            'DarsenaEstado_idDarsenaEstado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
