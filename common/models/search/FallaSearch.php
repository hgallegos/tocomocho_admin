<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Falla;

/**
 * FallaSearch represents the model behind the search form about `common\models\Falla`.
 */
class FallaSearch extends Falla
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idFalla', 'costoReparacion', 'idComentario'], 'integer'],
            [['categoria', 'descripcion'], 'safe'],
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
        $query = Falla::find();

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
            'idFalla' => $this->idFalla,
            'costoReparacion' => $this->costoReparacion,
            'idComentario' => $this->idComentario,
        ]);

        $query->andFilterWhere(['like', 'categoria', $this->categoria])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
