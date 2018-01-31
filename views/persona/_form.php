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
	/* Peticiones ajax */
	$.ajax({
		url: '<?= Url::to(['profesiones/index']) ?>',
		type: 'get',
		headers: {
	        'Authorization': 'Bearer ' + '<?= $token ?>'
	    },
	    success: function(res) {
	    	for(profesion in res) {
	    		$('#personas-profesion').append(`<option value="${res[profesion].profesion_id}">${res[profesion].nombre}</option>`)
	    	}
	    }
	})
	$.ajax({
		url: '<?= Url::to(['municipios/index']) ?>',
		type: 'get',
		headers: {
	        'Authorization': 'Bearer ' + '<?= $token ?>'
	    },
	    success: function(res) {
	    	for(municipio in res) {
	    		$('#personas-municipio').append(`<option value="${res[municipio].municipio_id}">${res[municipio].nombre}</option>`)
	    	}
	    }
	})
</script>
<?php JSRegister::end(); ?>

