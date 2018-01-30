<?php

namespace app\controllers;

use yii\filters\auth\HttpBearerAuth;

class ProfesionesController extends \yii\rest\ActiveController
{
    public $modelClass = "app\models\Profesiones";

    /* Autenticacion por cabecera Authorization con OAuth2 */
    public function behaviors() {
    	$behaviors = parent::behaviors();
    	$behaviors['autheticator'] = [
    		'class' => HttpBearerAuth::className()
    	];
    	return $behaviors;
    }

}
