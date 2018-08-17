<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\caching\DbDependency;
use yii\data\ActiveDataProvider;
use app\models\Event;
use app\models\Access;

/**
 * EventSearch represents the model behind the search form of `app\models\Event`.
 */
class EventSearch extends Event
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'author_id'], 'integer'],
            [['name', 'start_at', 'end_at', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Event::find();

        // add conditions that should always apply here
//        $dependency = new DbDependency([
//            'sql' => 'SELECT COUNT(id) FROM event',
//        ]);
//
//        $query->cache(3600, $dependency);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

//        $command = Event::find()
//            ->select('COUNT(*)')
//            ->joinWith('access')
//            ->andWhere(
//                [
//                    'or',
//                    ['author_id' => \Yii::$app->user->getId()],
//                    ['access.user_id' => \Yii::$app->user->getId()],
//                ]
//            )
//            ->createCommand();
//
//        $dependency = new DbDependency([
//            'sql => $command->getRawSql()',
//        ]);

        //$query->cache(30*24*60*60, $dependency);
        $query->cache(30*24*60*60);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'author_id' => $this->author_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andWhere(['author_id' => \Yii::$app->user->getId()]);

        return $dataProvider;
    }
}
