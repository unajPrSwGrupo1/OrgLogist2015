<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estante;

/**
 * EstanteSearch represents the model behind the search form about `app\models\Estante`.
 */
class EstanteSearch extends Estante
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEstante', 'EstanteEstado_idEstanteEstado', 'loadlimit'], 'integer'],
            [['Fila', 'Columna', 'descript'], 'safe'],
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
        $query = Estante::find();

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
            'idEstante' => $this->idEstante,
            'EstanteEstado_idEstanteEstado' => $this->EstanteEstado_idEstanteEstado,
            'loadlimit' => $this->loadlimit,
        ]);

        $query->andFilterWhere(['like', 'Fila', $this->Fila])
            ->andFilterWhere(['like', 'Columna', $this->Columna])
            ->andFilterWhere(['like', 'descript', $this->descript]);

        return $dataProvider;
    }
}
