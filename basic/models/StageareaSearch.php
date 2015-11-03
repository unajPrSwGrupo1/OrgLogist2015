<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Stagearea;

/**
 * StageareaSearch represents the model behind the search form about `app\models\Stagearea`.
 */
class StageareaSearch extends Stagearea
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idStageArea', 'TipoStageArea_idTipoStageArea', 'loadlimit'], 'integer'],
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
        $query = Stagearea::find();

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
            'idStageArea' => $this->idStageArea,
            'TipoStageArea_idTipoStageArea' => $this->TipoStageArea_idTipoStageArea,
            'loadlimit' => $this->loadlimit,
        ]);

        return $dataProvider;
    }
}
