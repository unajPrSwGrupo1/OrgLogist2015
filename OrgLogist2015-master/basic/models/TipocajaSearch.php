<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tipocaja;

/**
 * TipocajaSearch represents the model behind the search form about `app\models\Tipocaja`.
 */
class TipocajaSearch extends Tipocaja
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTipoCaja'], 'integer'],
            [['Tipo'], 'safe'],
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
        $query = Tipocaja::find();

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
            'idTipoCaja' => $this->idTipoCaja,
        ]);

        $query->andFilterWhere(['like', 'Tipo', $this->Tipo]);

        return $dataProvider;
    }
}
