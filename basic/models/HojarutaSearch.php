<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hojaruta;

/**
 * HojarutaSearch represents the model behind the search form about `app\models\Hojaruta`.
 */
class HojarutaSearch extends Hojaruta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idHojaRuta', 'cantCajas', 'cantPallets', 'Transporte_idTransporte', 'Transporte_TIpoTransporte_idTIpoTransporte', 'Transporte_RRHH_idRRHH', 'Transporte_RRHH_TipoRRHH_idTipoRRHH'], 'integer'],
            [['Destino'], 'safe'],
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
        $query = Hojaruta::find();

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
            'idHojaRuta' => $this->idHojaRuta,
            'cantCajas' => $this->cantCajas,
            'cantPallets' => $this->cantPallets,
            'Transporte_idTransporte' => $this->Transporte_idTransporte,
            'Transporte_TIpoTransporte_idTIpoTransporte' => $this->Transporte_TIpoTransporte_idTIpoTransporte,
            'Transporte_RRHH_idRRHH' => $this->Transporte_RRHH_idRRHH,
            'Transporte_RRHH_TipoRRHH_idTipoRRHH' => $this->Transporte_RRHH_TipoRRHH_idTipoRRHH,
        ]);

        $query->andFilterWhere(['like', 'Destino', $this->Destino]);

        return $dataProvider;
    }
}
