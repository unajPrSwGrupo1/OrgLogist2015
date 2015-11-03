<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pedido;

/**
 * PedidoSearch represents the model behind the search form about `app\models\Pedido`.
 */
class PedidoSearch extends Pedido
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPedido', 'cantCajas', 'cantPallets', 'RRHH_idRRHH', 'tiporrhh_idTipoRRHH', 'Cliente_idCliente'], 'integer'],
            [['Fecha', 'Hora'], 'safe'],
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
        $query = Pedido::find();

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
            'idPedido' => $this->idPedido,
            'cantCajas' => $this->cantCajas,
            'cantPallets' => $this->cantPallets,
            'RRHH_idRRHH' => $this->RRHH_idRRHH,
            'tiporrhh_idTipoRRHH' => $this->tiporrhh_idTipoRRHH,
            'Cliente_idCliente' => $this->Cliente_idCliente,
            'Fecha' => $this->Fecha,
            'Hora' => $this->Hora,
        ]);

        return $dataProvider;
    }
}
