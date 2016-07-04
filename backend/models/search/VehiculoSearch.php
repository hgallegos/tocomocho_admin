<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Vehiculo;

/**
 * VehiculoSearch represents the model behind the search form about `backend\models\Vehiculo`.
 */
class VehiculoSearch extends Vehiculo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idVehiculo', 'anio', 'nPuertas', 'tasacionFiscal', 'rendimientoTeorico', 'valorPermiso', 'precioVentaP', 'cSeguridad'], 'integer'],
            [['idMarca', 'tipo', 'marca', 'modelo', 'cilindrada', 'tipoCombustible', 'transmision', 'traccion', 'alzavidrios', 'cierreCentralizado', 'airbag', 'frenosABS', 'aireAcondicionado', 'nomImagen'], 'safe'],
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
        $query = Vehiculo::find();

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
            'idVehiculo' => $this->idVehiculo,
            'anio' => $this->anio,
            'nPuertas' => $this->nPuertas,
            'tasacionFiscal' => $this->tasacionFiscal,
            'rendimientoTeorico' => $this->rendimientoTeorico,
            'valorPermiso' => $this->valorPermiso,
            'precioVentaP' => $this->precioVentaP,
            'cSeguridad' => $this->cSeguridad,
        ]);

        $query->andFilterWhere(['like', 'idMarca', $this->idMarca])
            ->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'cilindrada', $this->cilindrada])
            ->andFilterWhere(['like', 'tipoCombustible', $this->tipoCombustible])
            ->andFilterWhere(['like', 'transmision', $this->transmision])
            ->andFilterWhere(['like', 'traccion', $this->traccion])
            ->andFilterWhere(['like', 'alzavidrios', $this->alzavidrios])
            ->andFilterWhere(['like', 'cierreCentralizado', $this->cierreCentralizado])
            ->andFilterWhere(['like', 'airbag', $this->airbag])
            ->andFilterWhere(['like', 'frenosABS', $this->frenosABS])
            ->andFilterWhere(['like', 'aireAcondicionado', $this->aireAcondicionado])
            ->andFilterWhere(['like', 'nomImagen', $this->nomImagen]);

        return $dataProvider;
    }
}
