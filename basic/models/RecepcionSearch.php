<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Recepcion;

/**
 * RecepcionSearch represents the model behind the search form about `app\models\Recepcion`.
 */
class RecepcionSearch extends Recepcion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idRecepcion', 'idFactura', 'idCaja', 'cantidad_esperada', 'cantidad_recibida', 'idEstante'], 'integer'],
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
        $query = Recepcion::find();

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
            'idRecepcion' => $this->idRecepcion,
            'idFactura' => $this->idFactura,
            'idCaja' => $this->idCaja,
            'cantidad_esperada' => $this->cantidad_esperada,
            'cantidad_recibida' => $this->cantidad_recibida,
            'idEstante' => $this->idEstante,
        ]);

        return $dataProvider;
    }
}
