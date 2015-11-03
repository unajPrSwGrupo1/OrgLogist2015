<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Loadlimit;

/**
 * LoadlimitSearch represents the model behind the search form about `app\models\Loadlimit`.
 */
class LoadlimitSearch extends Loadlimit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'large', 'width', 'tall', 'weight'], 'integer'],
            [['longUnit', 'weightUnt', 'descript'], 'safe'],
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
        $query = Loadlimit::find();

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
            'id' => $this->id,
            'large' => $this->large,
            'width' => $this->width,
            'tall' => $this->tall,
            'weight' => $this->weight,
        ]);

        $query->andFilterWhere(['like', 'longUnit', $this->longUnit])
            ->andFilterWhere(['like', 'weightUnt', $this->weightUnt])
            ->andFilterWhere(['like', 'descript', $this->descript]);

        return $dataProvider;
    }
}
