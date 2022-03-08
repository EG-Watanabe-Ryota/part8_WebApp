<?php
// src/Controller/ProductsController.php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class OrdersController extends AppController
{
    public $paginate = ['limit' => 50 ];// 1ページに表示するデータ件数];
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    
    public function index()
    {
        $condition = ['検索条件を入力' => '検索条件を入力',
                    '受注番号' => '受注番号',
                    '顧客名' => '顧客名',
                    'お届け先' => 'お届け先'];

        $status = ['入金待ち' => '入金待ち',
                    '入金済み' => '入金済み',
                    '未発送' => '未発送' ,
                    '発送済み' => '発送済み',
                    'キャンセル' => 'キャンセル',
                    '新規受付' => '新規受付',
                    '変更するステータスを選択してください' => '変更するステータスを選択してください'];
        // ORM テーブルのページ分割
        $this->set('orders', $this->paginate($this->Orders));
            // 部分的に完了したクエリをページ分割する
        $orders = $this->Orders->find();
        $this->set('orders', $this->paginate($orders));

        $this->set(compact('orders', 'status', 'condition'));

        $chk = filter_input(INPUT_POST, 'chk', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        if ($this->getRequest()->isPost()) {
            $status = $_POST['status'];
            if (!empty($chk)) {
                foreach ($chk as $key => $val) {
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
    }

    public function orderDetails($order_id)
    {
        /*order_dateilsテーブルに情報を入れる処理*/
        $OrderDatailsTable=TableRegistry::getTableLocator()->get('OrderDatails');

        $OrderDatails = $OrderDatailsTable->find()->where([
            'order_id' => $order_id
            ]);
        $orderDatails_data=$OrderDatails->toArray();

        /*productsテーブルを持ってくる*/
        $ProductTable=TableRegistry::getTableLocator()->get('Products');

        foreach ($orderDatails_data as $key => $val) {
            $product = $ProductTable->get($val['product_id'])->toArray(); //productsテーブルからorder_datailsテーブルのproduct_idをもとに商品情報を引っ張ってくる
            $data[$key]=$val->toArray() + $product;
        }
        $this->set(compact('data'));
    }

    //検索結果のページ表示
    public function find()
    {
        //statusをグローバル変数にするのもアリ
        $status = ['入金待ち' => '入金待ち',
                    '入金済み' => '入金済み',
                    '未発送' => '未発送',
                    '発送済み' => '発送済み',
                    'キャンセル' => 'キャンセル',
                    '新規受付' => '新規受付',
                    '変更するステータスを選択してください' => '変更するステータスを選択してください'];

        $condition = ['検索条件を入力' => '検索条件を入力',
                        '受注番号' => '受注番号',
                        '顧客名' => '顧客名',
                        'お届け先' => 'お届け先'];
        if ($this->request->is('post')) {
            $find = $_POST['find'];
            $cnd = $_POST['condition'];
            $set_name = 'name';
            switch ($cnd) {
                case '受注番号':
                    $set_name = 'id';
                    break;
                case '顧客名':
                    $set_name = 'name';
                    break;
                case 'お届け先':
                    $set_name = 'address';
                    break;
            }
            //配列に変換前のテーブル情報を渡す
            $orders = $this->Orders->find()->where([$set_name . " like " => '%' . $find . '%']);
            $this->set('orders', $this->paginate($orders));

            //POST送信された文字列でOrdersテーブル内を検索
            $orders = $orders->toArray();

            // $count = $orders->count(); //件数取得
        }
        $this->set(compact('orders', 'find', 'status', 'condition'));
    }

    public function confirm()
    {
    }
}
