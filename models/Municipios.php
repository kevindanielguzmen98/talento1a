<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "municipios".
 *
 * @property int $municipio_id
 * @property string $nombre
 *
 * @property Personas[] $personas
 */
class Municipios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'municipios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'municipio_id' => 'Municipio ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Personas::className(), ['municipio' => 'municipio_id']);
    }
}
