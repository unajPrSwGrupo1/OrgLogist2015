<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Darsena;

/**
 * DarsenaSearch represents the model behind the search form about `app\models\Darsena`.
 */
class DarsenaSearch extends Darsena
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idDarsena', 'DarsenaEstado_idDarsenaEstado'], 'integer'],
            [['Nombre', 'Descripcion'], 'safe'],
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
        $query = Darsena::find();

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
            'idDarsena' => $this->idDarsena,
            'DarsenaEstado_idDarsenaEstado' => $this->DarsenaEstado_idDarsenaEstado,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
