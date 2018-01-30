<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use richardfan\widget\JSRegister;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Personas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profesion')->dropdownList([]) ?>

    <?= $form->field($model, 'municipio')->textInput() ?>

    <?= $form->field($model, 'correo_electronico')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php JSRegister::begin(); ?>
<script>
	/* Peticiones */
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
</script>
<?php JSRegister::end(); ?>

