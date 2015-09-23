<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Factura;

/**
 * FacturaSearch represents the model behind the search form about `app\models\Factura`.
 */
class FacturaSearch extends Factura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idFactura', 'RRHH_idRRHH', 'RRHH_TipoRRHH_idTipoRRHH', 'Cliente_idCliente'], 'integer'],
            [['Monto'], 'number'],
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
        $query = Factura::find();

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
            'idFactura' => $this->idFactura,
            'Monto' => $this->Monto,
            'RRHH_idRRHH' => $this->RRHH_idRRHH,
            'RRHH_TipoRRHH_idTipoRRHH' => $this->RRHH_TipoRRHH_idTipoRRHH,
            'Cliente_idCliente' => $this->Cliente_idCliente,
            'Fecha' => $this->Fecha,
            'Hora' => $this->Hora,
        ]);

        return $dataProvider;
    }
}
