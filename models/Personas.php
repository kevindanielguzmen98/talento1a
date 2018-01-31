<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personas".
 *
 * @property int $persona_id
 * @property string $nombre
 * @property int $profesion
 * @property int $municipio
 * @property string $correo_electronico
 *
 * @property Municipios $municipio0
 * @property Profesiones $profesion0
 */
class Personas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'profesion', 'municipio', 'correo_electronico'], 'required'],
            [['profesion', 'municipio'], 'default', 'value' => null],
            [['profesion', 'municipio'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
            [['correo_electronico'], 'string', 'max' => 150],
            [['municipio'], 'exist', 'skipOnError' => true, 'targetClass' => Municipios::className(), 'targetAttribute' => ['municipio' => 'municipio_id']],
            [['profesion'], 'exist', 'skipOnError' => true, 'targetClass' => Profesiones::className(), 'targetAttribute' => ['profesion' => 'profesion_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'persona_id' => 'Persona ID',
            'nombre' => 'Nombre',
            'profesion' => 'Profesión',
            'municipio' => 'Municipio',
            'correo_electronico' => 'Correo Electronico',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio0()
    {
        return $this->hasOne(Municipios::className(), ['municipio_id' => 'municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesion0()
    {
        return $this->hasOne(Profesiones::className(), ['profesion_id' => 'profesion']);
    }
}
