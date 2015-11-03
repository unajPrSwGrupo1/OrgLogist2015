<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PalletHasCaja;

/**
 * PalletHasCajaSearch represents the model behind the search form about `app\models\PalletHasCaja`.
 */
class PalletHasCajaSearch extends PalletHasCaja
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Pallet_idPallet', 'Caja_idCaja'], 'integer'],
            [['descript'], 'safe'],
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
        $query = PalletHasCaja::find();

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
            'Pallet_idPallet' => $this->Pallet_idPallet,
            'Caja_idCaja' => $this->Caja_idCaja,
        ]);

        $query->andFilterWhere(['like', 'descript', $this->descript]);

        return $dataProvider;
    }
}
