<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Personas;

/**
 * PersonasSearch represents the model behind the search form of `app\models\Personas`.
 */
class PersonasSearch extends Personas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persona_id', 'profesion', 'municipio'], 'integer'],
            [['nombre', 'correo_electronico'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Personas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'persona_id' => $this->persona_id,
            'profesion' => $this->profesion,
            'municipio' => $this->municipio,
        ]);

        $query->andFilterWhere(['ilike', 'nombre', $this->nombre])
            ->andFilterWhere(['ilike', 'correo_electronico', $this->correo_electronico]);

        return $dataProvider;
    }
}
