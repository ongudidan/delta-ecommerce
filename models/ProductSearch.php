<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    public $category_id;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_sub_category_id', 'product_category_id', 'company_id', 'name', 'product_number', 'description', 'thumbnail', 'created_by', 'updated_by'], 'safe'],
            [['selling_price'], 'number'],
            [['created_at', 'updated_at'], 'integer'],
            [['category_id'], 'safe'], // Add category_id for filtering

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
        // $query = Product::find();
        $query = Product::find()->joinWith('productCategory');


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20, // Number of items per page
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'selling_price' => $this->selling_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'product_sub_category_id', $this->product_sub_category_id])
            ->andFilterWhere(['like', 'product_category_id', $this->product_category_id])
            ->andFilterWhere(['like', 'company_id', $this->company_id])
            ->andFilterWhere(['like', 'product.name', $this->name])
            ->andFilterWhere(['like', 'product_number', $this->product_number])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'thumbnail', $this->thumbnail])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        // Filter by category_id from the related table
        $query->andFilterWhere(['product_category.id' => $this->category_id]);

        return $dataProvider;
    }
}
