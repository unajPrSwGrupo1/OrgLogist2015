<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ticket;

/**
 * TicketSearch represents the model behind the search form about `app\models\Ticket`.
 */
class TicketSearch extends Ticket
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTicket', 'MotivoTicket_idMotivoTicket', 'RRHH_idRRHH', 'RRHH_TipoRRHH_idTipoRRHH', 'Transporte_idTransporte', 'Transporte_TIpoTransporte_idTIpoTransporte', 'Transporte_RRHH_idRRHH', 'Transporte_RRHH_TipoRRHH_idTipoRRHH'], 'integer'],
            [['Descripcion', 'Fecha', 'Hora'], 'safe'],
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
        $query = Ticket::find();

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
            'idTicket' => $this->idTicket,
            'MotivoTicket_idMotivoTicket' => $this->MotivoTicket_idMotivoTicket,
            'RRHH_idRRHH' => $this->RRHH_idRRHH,
            'RRHH_TipoRRHH_idTipoRRHH' => $this->RRHH_TipoRRHH_idTipoRRHH,
            'Transporte_idTransporte' => $this->Transporte_idTransporte,
            'Transporte_TIpoTransporte_idTIpoTransporte' => $this->Transporte_TIpoTransporte_idTIpoTransporte,
            'Transporte_RRHH_idRRHH' => $this->Transporte_RRHH_idRRHH,
            'Transporte_RRHH_TipoRRHH_idTipoRRHH' => $this->Transporte_RRHH_TipoRRHH_idTipoRRHH,
            'Fecha' => $this->Fecha,
            'Hora' => $this->Hora,
        ]);

        $query->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
