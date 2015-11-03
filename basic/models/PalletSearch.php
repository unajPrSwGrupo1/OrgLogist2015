<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pallet;

/**
 * PalletSearch represents the model behind the search form about `app\models\Pallet`.
 */
class PalletSearch extends Pallet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPallet', 'cantCajas', 'physic'], 'integer'],
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
        $query = Pallet::find();

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
            'idPallet' => $this->idPallet,
            'cantCajas' => $this->cantCajas,
            'physic' => $this->physic,
        ]);

        return $dataProvider;
    }
}
