<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idAutenticacion', 'RRHH_idRRHH', 'tiporrhh_idTipoRRHH', 'activate'], 'integer'],
            [['username', 'password', 'Mail', 'Authkey', 'Token', 'Fecha', 'Hora'], 'safe'],
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
        $query = User::find();

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
            'idAutenticacion' => $this->idAutenticacion,
            'RRHH_idRRHH' => $this->RRHH_idRRHH,
            'tiporrhh_idTipoRRHH' => $this->tiporrhh_idTipoRRHH,
            'Fecha' => $this->Fecha,
            'Hora' => $this->Hora,
            'activate' => $this->activate,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'Mail', $this->Mail])
            ->andFilterWhere(['like', 'Authkey', $this->Authkey])
            ->andFilterWhere(['like', 'Token', $this->Token]);

        return $dataProvider;
    }
}
