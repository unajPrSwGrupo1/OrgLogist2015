<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RrhhSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recursos Humanos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rrhh-index" style="background-image: url(imagenes/FondoLogin.png)"  >

    <h1><?= Html::encode($this->title) ?></h1>      
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Empleado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idRRHH',
            'Nombre',
            'Apellido',
            'Edad',
            'Salario',
            'Jefe',
            'descript',
	    //'activate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?= Html::a('Ver Desactivados', ['inactiv'], ['class' => 'btn btn-success']) ?>
    <?= Html::a('Ver Activos', ['index'], ['class' => 'btn btn-success']) ?>

</div>
