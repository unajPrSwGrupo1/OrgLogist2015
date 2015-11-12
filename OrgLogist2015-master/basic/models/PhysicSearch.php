<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Physic;

/**
 * PhysicSearch represents the model behind the search form about `app\models\Physic`.
 */
class PhysicSearch extends Physic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['large', 'tall', 'width', 'maxWeight'], 'number'],
            [['descript', 'longUnit', 'weightUnit'], 'safe'],
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
        $query = Physic::find();

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
            'tall' => $this->tall,
            'width' => $this->width,
            'maxWeight' => $this->maxWeight,
        ]);

        $query->andFilterWhere(['like', 'descript', $this->descript])
            ->andFilterWhere(['like', 'longUnit', $this->longUnit])
            ->andFilterWhere(['like', 'weightUnit', $this->weightUnit]);

        return $dataProvider;
    }
}
