<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Caja;

/**
 * CajaSearch represents the model behind the search form about `app\models\Caja`.
 */
class CajaSearch extends Caja
{
    public $tipoCajaIdTipoCaja;
    public $physic0;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCaja', 'TipoCaja_idTipoCaja', 'physic'], 'integer'],
            [['physic0','tipoCajaIdTipoCaja'],'safe'],
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
        $query = Caja::find();

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
            'idCaja' => $this->idCaja,
            'TipoCaja_idTipoCaja' => $this->TipoCaja_idTipoCaja,
            'physic' => $this->physic,
        ]);
        
        return $dataProvider;
    }
}
