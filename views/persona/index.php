<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use app\models\Profesiones;
use app\models\Municipios;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administración de personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
