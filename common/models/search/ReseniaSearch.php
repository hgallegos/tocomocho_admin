<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Resenia;

/**
 * ReseniaSearch represents the model behind the search form about `common\models\Resenia`.
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


    public function search_ver($params,$id)
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

        $query->where(['idVehiculo' => $id]);


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

    public function RetornaAutoID($id){
        $rows = (new \yii\db\Query())
            ->select('idVehiculo')
            ->from('Resenia')
            ->where(["idComentario" => $id])
            ->one();
        return $rows;
    }

    public function AutoVer_Usuario($id){
        $data = array();
        $rows = (new \yii\db\Query())
            ->select('*')
            ->from('Usuario')
            ->all();
        for($i = 0; $i< sizeof($rows); $i++){
            $data[$rows[$i]['id']] = $rows[$i]["nombre"];
        }
        return $data;
    }
    
}
