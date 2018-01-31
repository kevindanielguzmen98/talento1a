<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Personas */

$this->title = 'Actualizar: '.$model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->nombre]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personas-update">

    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h2><?= Html::encode($this->title) ?></h2>
        </div>
        <div class="col-xs-12 col-md-6">
            <br>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'token' => $token
    ]) ?>

</div>
