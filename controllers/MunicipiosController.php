<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\controllers;

use yii\filters\auth\HttpBearerAuth;

/**
 * Component is the base class that provides the *property*, *event* and *behavior* features.
 *
 * @include @yii/docs/base-Component.md
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MunicipiosController extends \yii\rest\ActiveController
{
    public $modelClass = "app\models\Municipios";

    /* Autenticacion por cabecera Authorization con OAuth2 */
    public function behaviors() {
    	$behaviors = parent::behaviors();
    	$behaviors['autheticator'] = [
    		'class' => HttpBearerAuth::className()
    	];
    	return $behaviors;
    }

}
