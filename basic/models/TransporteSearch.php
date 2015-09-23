<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transporte;

/**
 * TransporteSearch represents the model behind the search form about `app\models\Transporte`.
 */
class TransporteSearch extends Transporte
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTransporte', 'Peso', 'TIpoTransporte_idTIpoTransporte', 'RRHH_idRRHH', 'RRHH_TipoRRHH_idTipoRRHH'], 'integer'],
            [['Matricula'], 'safe'],
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
        $query = Transporte::find();

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
            'idTransporte' => $this->idTransporte,
            'Peso' => $this->Peso,
            'TIpoTransporte_idTIpoTransporte' => $this->TIpoTransporte_idTIpoTransporte,
            'RRHH_idRRHH' => $this->RRHH_idRRHH,
            'RRHH_TipoRRHH_idTipoRRHH' => $this->RRHH_TipoRRHH_idTipoRRHH,
        ]);

        $query->andFilterWhere(['like', 'Matricula', $this->Matricula]);

        return $dataProvider;
    }
}
