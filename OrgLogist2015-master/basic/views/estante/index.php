<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstanteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estante-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idEstante',
            'Fila',
            'Columna',
            'EstanteEstado_idEstanteEstado',
            'loadlimit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
