<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Loadlimit */

$this->title = 'Create Loadlimit';
$this->params['breadcrumbs'][] = ['label' => 'Loadlimits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loadlimit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
