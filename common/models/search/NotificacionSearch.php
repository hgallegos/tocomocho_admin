<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Notificacion;

/**
 * NotificacionSearch represents the model behind the search form about `common\models\Notificacion`.
 */
class NotificacionSearch extends Notificacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNotificacion', 'idUsuario', 'idVehiculo'], 'integer'],
            [['descripcion'], 'safe'],
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
            'idNotificacion' => $this->idNotificacion,
            'idUsuario' => $this->idUsuario,
            'idVehiculo' => $this->idVehiculo,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
