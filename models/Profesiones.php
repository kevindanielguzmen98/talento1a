<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profesiones".
 *
 * @property int $profesion_id
 * @property string $nombre
 *
 * @property Personas[] $personas
 */
class Profesiones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profesiones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'profesion_id' => 'Profesion ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Personas::className(), ['profesion' => 'profesion_id']);
    }
}
