<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use app\models\Profesiones;
use app\models\Municipios;

/* @var $this yii\web\View */
/* @var $model app\models\Personas */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-view">

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

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->persona_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->persona_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro de querer eliminar esta persona?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'persona_id',
            'nombre',
            // 'profesion',
            [
                'label' => 'Profesión',
                'attribute' => 'profesion_id',
                'value' => Profesiones::findOne($model->profesion)->nombre
            ],
            // 'municipio',
            [
                'label' => 'Municipio',
                'attribute' => 'municipio_id',
                'value' => Municipios::findOne($model->municipio)->nombre
            ],
            'correo_electronico',
            [
                'label' => 'Fecha nacimiento',
                'attribute' => 'fecha_nacimiento'
            ]
        ],
    ]) ?>

</div>
