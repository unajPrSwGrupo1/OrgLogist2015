<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Caja;

/**
 * CajaSearch represents the model behind the search form about `app\models\Caja`.
 */
class CajaSearch extends Caja
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCaja', 'Peso', 'Volumen', 'TipoCaja_idTipoCaja'], 'integer'],
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
        $query = Caja::find();

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
            'idCaja' => $this->idCaja,
            'Peso' => $this->Peso,
            'Volumen' => $this->Volumen,
            'TipoCaja_idTipoCaja' => $this->TipoCaja_idTipoCaja,
        ]);

        return $dataProvider;
    }
}
