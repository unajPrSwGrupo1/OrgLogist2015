<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rrhh;

/**
 * RrhhSearch represents the model behind the search form about `app\models\Rrhh`.
 */
class RrhhSearch extends Rrhh
{
    
    private $tablemode=1;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idRRHH', 'Edad', 'Jefe','activate'], 'integer'],
            [['Nombre', 'Apellido', 'descript'], 'safe'],
            [['Salario'], 'number'],
        ];
    }

    public function setTableMode1(){
	$this->tablemode=1;
    }

    public function setTableMode0(){
	$this->tablemode=0;
    }

    public function getTableMode(){
	$this->tablemode=0;
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
        $query = Rrhh::find();

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
            'idRRHH' => $this->idRRHH,
            'Edad' => $this->Edad,
            'Salario' => $this->Salario,
            'Jefe' => $this->Jefe,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Apellido', $this->Apellido])
            ->andFilterWhere(['like', 'descript', $this->descript])
	    ->andFilterWhere(['like', 'activate', $this->tablemode])
	;

        return $dataProvider;
    }
}
