<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Darsena */

$this->title = 'Create Darsena';
$this->params['breadcrumbs'][] = ['label' => 'Darsenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="darsena-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
