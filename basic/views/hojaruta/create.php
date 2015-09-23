<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hojaruta */

$this->title = 'Create Hojaruta';
$this->params['breadcrumbs'][] = ['label' => 'Hojarutas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hojaruta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
