<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Resenia;

/**
 * ReseniaSearch represents the model behind the search form about `backend\models\Resenia`.
 */
class ReseniaSearch extends Resenia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idComentario', 'idUsuario', 'idVehiculo'], 'integer'],
            [['contenido', 'fecha'], 'safe'],
            [['nCalidad', 'nEconomia', 'valoracion', 'rendimientoR'], 'number'],
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
        $query = Resenia::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idComentario' => $this->idComentario,
            'fecha' => $this->fecha,
            'idUsuario' => $this->idUsuario,
            'idVehiculo' => $this->idVehiculo,
            'nCalidad' => $this->nCalidad,
            'nEconomia' => $this->nEconomia,
            'valoracion' => $this->valoracion,
            'rendimientoR' => $this->rendimientoR,
        ]);

        $query->andFilterWhere(['like', 'contenido', $this->contenido]);

        return $dataProvider;
    }
}
