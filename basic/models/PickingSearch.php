<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Picking;

/**
 * PickingSearch represents the model behind the search form about `app\models\Picking`.
 */
class PickingSearch extends Picking
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num_picking', 'idCaja', 'idPedido', 'cantidad_pedida', 'cantidad_pickeada', 'idEstante', 'idStageArea'], 'integer'],
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
        $query = Picking::find();

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
            'num_picking' => $this->num_picking,
            'idCaja' => $this->idCaja,
            'idPedido' => $this->idPedido,
            'cantidad_pedida' => $this->cantidad_pedida,
            'cantidad_pickeada' => $this->cantidad_pickeada,
            'idEstante' => $this->idEstante,
            'idStageArea' => $this->idStageArea,
        ]);

        return $dataProvider;
    }
}
