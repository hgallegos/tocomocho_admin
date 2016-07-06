<?php

namespace common\models\search;

use common\models\Vehiculo;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Notificacion;

/**
 * NotificacionSearch represents the model behind the search form about `common\models\Notificacion`.
 */
class NotificacionSearch extends Notificacion
{
    public $marca;
    public $nombre;
    public $anio;
    public $modelo;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNotificacion', 'idUsuario', 'idVehiculo'], 'integer'],
            [['descripcion'], 'safe'],
            [['marca', 'nombre', 'anio'], 'safe'],
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
        $query = Notificacion::find();

        // Important: lets join the query with our previously mentioned relations
        // I do not make any other configuration like aliases or whatever, feel free
        // to investigate that your self
        $query->joinWith(['usuario', 'vehiculo']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // Important: here is how we set up the sorting
        // The key is the attribute name on our "NotificationSearch" instance
        $dataProvider->sort->attributes['nombre usuario'] = [
            // The tables are the ones our relation are configured to
            'asc' => ['Usuario.nombre' => SORT_ASC],
            'desc' => ['Usuario.nombre' => SORT_DESC],
        ];
        //the same with the other table
        $dataProvider->sort->attributes['marca'] = [
            'asc' => ['Vehiculo.marca' => SORT_ASC],
            'desc' => ['Vehiculo.marca' => SORT_DESC],
        ];
        //the same with the other table
        $dataProvider->sort->attributes['modelo'] = [
            'asc' => ['Vehiculo.modelo' => SORT_ASC],
            'desc' => ['Vehiculo.modelo' => SORT_DESC],
        ];

        //the same with the other table
        $dataProvider->sort->attributes['anio'] = [
            'asc' => ['Vehiculo.anio' => SORT_ASC],
            'desc' => ['Vehiculo.anio' => SORT_DESC],
        ];




        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idNotificacion' => $this->idNotificacion,
            'idUsuario' => $this->idUsuario,
            'idVehiculo' => $this->idVehiculo,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'Vehiculo.marca', $this->marca])
            ->andFilterWhere(['like', 'Usuario.nombre', $this->nombre])
            ->andFilterWhere(['like', 'Usuario.modelo', $this->modelo])
            ->andFilterWhere(['like', 'Usuario.anio', $this->anio]);

        return $dataProvider;
    }
}
