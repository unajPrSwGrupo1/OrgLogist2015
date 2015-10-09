<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FuncTiporrhh;

/**
 * FuncTiporrhhSearch represents the model behind the search form about `app\models\FuncTiporrhh`.
 */
class FuncTiporrhhSearch extends FuncTiporrhh
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idFunc', 'tiporrhh_idTipoRRHH'], 'integer'],
            [['link_func', 'desc_func'], 'safe'],
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
        $query = FuncTiporrhh::find();

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
            'idFunc' => $this->idFunc,
            'tiporrhh_idTipoRRHH' => $this->tiporrhh_idTipoRRHH,
        ]);

        $query->andFilterWhere(['like', 'link_func', $this->link_func])
            ->andFilterWhere(['like', 'desc_func', $this->desc_func]);

        return $dataProvider;
    }
}
