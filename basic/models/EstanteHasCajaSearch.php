<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstanteHasCaja;

/**
 * EstanteHasCajaSearch represents the model behind the search form about `app\models\EstanteHasCaja`.
 */
class EstanteHasCajaSearch extends EstanteHasCaja
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Estante_idEstante', 'Estante_EstanteEstado_idEstanteEstado', 'Caja_idCaja', 'Caja_TipoCaja_idTipoCaja'], 'integer'],
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
        $query = EstanteHasCaja::find();

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
            'Estante_idEstante' => $this->Estante_idEstante,
            'Estante_EstanteEstado_idEstanteEstado' => $this->Estante_EstanteEstado_idEstanteEstado,
            'Caja_idCaja' => $this->Caja_idCaja,
            'Caja_TipoCaja_idTipoCaja' => $this->Caja_TipoCaja_idTipoCaja,
        ]);

        return $dataProvider;
    }
}
