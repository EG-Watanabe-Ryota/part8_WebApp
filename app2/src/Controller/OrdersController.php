<?php
// src/Controller/ProductsController.php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class OrdersController extends AppController
{
    public $paginate = [
		'limit' => 50 // 1ページに表示するデータ件数
	];
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    public function index()
    {
        // ORM テーブルのページ分割
        $this->set('orders', $this->paginate($this->Orders));
            // 部分的に完了したクエリをページ分割する
        $orders = $this->Orders->find();
        $this->set('orders', $this->paginate($orders));
        
        $status = ['入金待ち' => '入金待ち', '入金済み' => '入金済み', '未発送' => '未発送' ,'発送済み' => '発送済み','キャンセル' => 'キャンセル','新規受付' => '新規受付','変更するステータスを選択してください' => '変更するステータスを選択してください'];
        $this->set(compact('orders','status'));

        $chk = filter_input(INPUT_POST, 'chk', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        if ($this->getRequest()->isPost()) {
            $status = $_POST['status'];
            // $query = $orders->query();

            if (!empty($chk)) {
                foreach($chk as $key => $val){
                    /*post送信されたorder_idをもとにステータスを変更する*/
                    $this->Orders->updateAll(
                        [  // フィールド
                            'status' => $status
                        ],
                        [  // 条件
                            'id' => $val
                        ]
                    );
                }
                $this->redirect(['controller' => 'Orders', 'action' => 'index']);
            }
        }
        // $this->set('order', $this->paginate());

    }

    public function orderDetails($order_id)
    {
        /*order_dateilsテーブルに情報を入れる処理*/
        $OrderDatailsTable=TableRegistry::getTableLocator()->get('OrderDatails');

        $OrderDatails_query = $OrderDatailsTable->find()->where([
            'order_id' => $order_id
            ]); 
        // debug($OrderDatails_query->toArray());
        $orderDatails_data=$OrderDatails_query->toArray();

        /*productsテーブルを持ってくる*/
        $ProductTable=TableRegistry::getTableLocator()->get('Products');

        foreach($orderDatails_data as $key => $val){
            $product_query = $ProductTable->get($val['product_id'])->toArray(); //productsテーブルからorder_datailsテーブルのproduct_idをもとに商品情報を引っ張ってくる
            $data[$key]=$val->toArray() + $product_query;
        }
        debug($data);
        

        $this->set(compact('data'));

    }

}