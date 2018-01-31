<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use richardfan\widget\JSRegister;
use yii\jui\DatePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Personas */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
	.right-align {
		float: right;
	}
</style>

<div class="personas-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    	<div class="col-sm-12 col-md-6">
    		<?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    	</div>
    	<div class="col-sm-12 col-md-6">
    		<?= $form->field($model, 'profesion')->dropdownList([]) ?>
    	</div>
    </div>

    <div class="row">
    	<div class="col-sm-12 col-md-6">
    		<?= $form->field($model, 'municipio')->dropdownList([]) ?>	
    	</div>
    	<div class="col-sm-12 col-md-6">
    		<?= $form->field($model, 'correo_electronico')->textInput(['maxlength' => true]) ?>
    	</div>
    </div>

    <div class="row">
    	<div class="col-sm-12 col-md-6">
    		<?= $form->field($model, 'fecha_nacimiento')->widget(DatePicker::className(), [
				    'language' => 'es',
				    'dateFormat' => 'yyyy-MM-dd',
				    'options' => ['class' => 'form-control'],
				    'value' => $model->fecha_nacimiento
				]) 
			?>
    	</div>
    </div>

    <div class="row">
    	<div class="col-sm-12">
    		<div class="form-group">
		        <?= Html::a( 'Cancelar', Url::to(['persona/index']), ['class' => 'btn btn-secundary right-align']); ?>&nbsp;<?= Html::submitButton('Guardar', ['class' => 'btn btn-success right-align']) ?>
		    </div>
    	</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php JSRegister::begin(); ?>
<script>
	/* Carga de datos */
	var linkMunicipios = '<?= Url::to(['municipios/index']) ?>'
	var linkProfesiones = '<?= Url::to(['profesiones/index']) ?>'
	cargarDatos('personas-profesion', linkProfesiones, 'profesion_id', 'nombre')
	cargarDatos('personas-municipio', linkMunicipios, 'municipio_id', 'nombre')
	/* Cargar los datos */
	function cargarDatos(idElemento, link, indice, contenido) {
		/* Consulta de numero de paginas */
		$.ajax({
			url: link,
			type: 'head',
			headers: {
		        'Authorization': 'Bearer ' + '<?= $token ?>'
		    },
		    success: function(res, textStatus, request) {
		    	hacerPeticiones(idElemento, request.getResponseHeader('X-Pagination-Page-Count'), link, indice, contenido)
		    }
		})
	}
	function hacerPeticiones(idElemento, numeroPaginas, link, indice, contenido) {
		/* Consulta de los datos */
		for(var i=0; i<numeroPaginas; i++) {
			$.ajax({
				url: link + '?page=' + (i+1) + '&per-page=50',
				type: 'get',
				headers: {
			        'Authorization': 'Bearer ' + '<?= $token ?>'
			    },
			    success: function(res, textStatus, request) {
			    	for(dato in res) {
			    		$('#' + idElemento).append(`<option value="${eval('res[dato].' + indice)}">${eval('res[dato].' + contenido)}</option>`)
			    	}
			    }
			})
		}
	}
</script>
<?php JSRegister::end(); ?>

