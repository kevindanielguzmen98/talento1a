<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\grid\GridView;
use app\models\Profesiones;
use app\models\Municipios;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administración de personas';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .margin-align {
        margin-top: 15px;
        float: right;
    }
</style>
<div class="personas-index">

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

    <div class="row">
        <div class="col-xs-12">
            <?= Html::a('Nuevo', ['create'], ['class' => 'btn btn-success margin-align']) ?>
        </div>
    </div>   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'persona_id',
            'nombre',
            // 'profesion',
            [
                /* Modificamos los items del grid para mostrar la información exacta */
                'label' => 'Profesión',
                'attribute' => 'profesion',
                'value' => function($model) {
                    $profesion = Profesiones::findOne($model->profesion);
                    return $profesion->nombre;
                },
                'filter' => ArrayHelper::map(Profesiones::find()->all(), 'profesion_id', 'nombre')
            ],
            // 'municipio',
            [
                /* Modificamos los items del grid para mostrar la información exacta */
                'label' => 'Municipio',
                'attribute' => 'municipio',
                'value' => function($model) {
                    $municipio = Municipios::findOne($model->municipio);
                    return $municipio->nombre;
                },
                'filter' => ArrayHelper::map(Municipios::find()->all(), 'municipio_id', 'nombre')
            ],
            'correo_electronico',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
