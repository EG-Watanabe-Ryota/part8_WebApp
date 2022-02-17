<?php
// src/Controller/ProductsController.php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

class OrdersController extends AppController
{
    //ログインしてなかったらここに遷移(住所フォーム入力へ)
    public function index(){
        //セッション周り
        $session = $this->getRequest()->getSession();
        if ($this->getRequest()->isPost()) {
            // Post送信の場合の処理
            $session->write('guest',$_POST);
            $this->redirect(['controller'=>'orders','action'=>'payment']);
        }
    }
    public function payment()
        {
        $session = $this->getRequest()->getSession();
        // debug($session->read('guest'));
        if ($this->getRequest()->isPost()) {
            // Post送信の場合の処理
            $session->write('guest.payment',$_POST['payment']);
            $this->redirect(['controller'=>'orders','action'=>'confirm']);
        }
    }
    //ログインしてたらここに遷移(支払い方法選択画面へ)
    public function customerPayment(){
        //DB処理
        $payments = TableRegistry::getTableLocator()->get('Payments');
        $payments_query = $payments->find();
        foreach ($payments_query as $row) {
            $payment_methods[] = ['id'=>$row->id,'name'=>$row->name];
        }
        $this->set(compact('payment_methods'));
        
    }

    
    public function confirm(){
        //セッションの破棄を忘れずに！！！！
        /*変数*/
        $session = $this->getRequest()->getSession(); //セッション処理
        $result = $this->Authentication->getResult(); //ログインしてるかどうか調べる変数
        $customer = $result->getData(); //ログインしているユーザー情報をもってくる
        $islogin = false; //ログイン判定に用いる変数

        /*ログイン時の処理*/
        if($result->isValid()){
            $islogin = true;//ログインしてた変数を真にする

            //前のページでPOSTで送信してもらった支払い方法選択の情報を回収
            $method_result = $_POST['payment'];

            //DB処理(paymentsテーブル)
            $payments = TableRegistry::getTableLocator()->get('Payments');
            $payments_query = $payments->find()->where(['id' => $method_result]);
            foreach ($payments_query as $row){
                $payment_name=$row->name;
            }
            $this->set(compact('payment_name'));

            //DB処理(customersテーブル)
            $customers = TableRegistry::getTableLocator()->get('customers');
            $customers_query = $customers->find()->where(['id' => $customer->id]);
            foreach ($customers_query as $row) {
                $id=$row->id;
                $name=$row->name;
                $postal_code=$row->postal_code;
                $address=$row->address;
                $tel=$row->tel;
            }

            //addCompleteに送る配列変数
            $project = ['customer_id' => $id, 
                        'payment_id'  => $method_result,
                        'address'     => $address,
                        'name'        => $name];
            $this->set(compact('name','postal_code','address','tel','project'));
        }
        //ログインしてないときの処理
        else{
            $guest=$session->read('guest');//ゲストの情報を読み込む

            //都道府県判定(穏やかな比較でも問題ないので、switchを使う 長くなりそうなので、どっかにメソッドとして作るのも検討)
            switch($guest['order_pref']){
                case 1:
                    $guest['order_pref'] = '北海道';
                    break;
                case 2:
                    $guest['order_pref'] = '青森県';
                    break;
                case 3:
                    $guest['order_pref'] = '岩手県';
                    break;
                case 4:
                    $guest['order_pref'] = '宮城県';
                    break;  
                case 5:
                    $guest['order_pref'] = '秋田県';
                    break;
                case 6:
                    $guest['order_pref'] = '山形県';
                    break;
                case 7:
                    $guest['order_pref'] = '福島県';
                    break;
                case 8:
                    $guest['order_pref'] = '茨城県';
                    break;
                case 9:
                    $guest['order_pref'] = '栃木県';
                    break;
                case 10:
                    $guest['order_pref'] = '群馬県';
                    break;
                case 11:
                    $guest['order_pref'] = '埼玉県';
                    break;
                case 12:
                    $guest['order_pref'] = '千葉県';
                    break;  
                case 13:
                    $guest['order_pref'] = '東京都';
                    break;
                case 14:
                    $guest['order_pref'] = '神奈川県';
                    break;
                case 15:
                    $guest['order_pref'] = '新潟県';
                    break;
                case 16:
                    $guest['order_pref'] = '富山県';
                    break;                                
            }
            $project = [ 
            'payment_id'  => $guest['payment'],
            'address'     => h($guest['order_pref']) . h($guest['order_addr01']) . h($guest['order_addr02']),
            'name'        => h($guest['order_name01']) .  h($guest['order_name02'])
            ];
            //ビューにゲストの情報を格納した変数を渡す
            $this->set(compact('guest','project'));
        }

        //ログイン時未ログイン時共有処理
        $this->set(compact('islogin'));

        //カート内の情報を読み込む
        $items = $session->read('carts');
        debug($items);
        

        $this->set(compact('items'));
    }

    public function addComplete(){
        //前ページでPOST送信された$projectを受け取る
        $order_data=$_POST;
        $session = $this->getRequest()->getSession(); //セッション処理
        //カート内の情報を読み込む
        $items = $session->read('carts');

        /*カート内の合計金額を計算*/
        $total_price = 0;
        foreach($items as $i=>$val){
            $total_price+=$items[$i]['price']*$items[$i]['quantity'];
        }
        
        /*注文日時を取得*/
        $timestamp = new Time(date('Y-m-d H:i:s'));

        $result = $this->Authentication->getResult();

        // debug($order_data);
        //ordersテーブルにユーザー情報を入れる処理
        $ordersTable=TableRegistry::getTableLocator()->get('orders');
        $order=$ordersTable->newEmptyEntity();

        /*レコード追加*/
        if($result->isValid()){
            $order->customer_id=$order_data['customer_id'];
        }
        $order->shipment_id=1;
        $order->payment_id=$order_data['payment_id'];
        $order->address=$order_data['address'];
        $order->name=$order_data['name'];
        $order->total_price=$total_price;

        switch($order_data['payment_id']){
            case 1:
                $order->status='入金待ち';
                break;
            case 2:
                $order->status='未発送';
                break;
        }

        if ($ordersTable->save($order)) {
            $id = $order->id;
        } else {
            $id=-1;//saveが失敗したらidに-1を代入
            //-1とかで失敗判定するんじゃなくて、失敗しました的なページ作成してそこにリダイレクトさせた方がよさそう
        }

        if($id !== -1){ //もし-1ならばorder_datailsテーブルに保存を行わない
            /*order_dateilsテーブルに情報を入れる処理*/
            $OrderDatailsTable=TableRegistry::getTableLocator()->get('OrderDatails');
            // $OrderDatail=$OrderDatailsTable->newEmptyEntity();

            /*productsテーブルを持ってくる*/
            $ProductTable=TableRegistry::getTableLocator()->get('Products');


            /*データ変換*/
            foreach($items as $val){
                $product_query = $ProductTable->get($val['id']); //productsテーブルからorder_datailsテーブルのproduct_idをもとに商品情報を引っ張ってくる
                // debug($product_query->price);
                $data[]=['product_id' => $val['id'],
                        'order_id'    => $id,
                        'quantity'    => $val['quantity'],
                        'sub_total'   => (int)$val['quantity'] * (int)$product_query->price]; //一応int型にキャストしておく

            }
            $entities = $OrderDatailsTable->newEntities($data);

            // Entitiesの分だけ保存処理
            foreach ($entities as $entity) {
                // Save entity
                $OrderDatailsTable->save($entity);
            }
        }
        /*セッション破棄*/
        $session = $this->getRequest()->getSession();
        if ($session->check('guest')) {
            $session->destroy('guest');
        }
        $session->destroy('items');

        //topページか注文受け付けましたページにリダイレクトさせないと更新かけるとテーブルに書き込んでしまう
        $this->redirect(['controller' => 'orders', 'action' => 'orderComplete']);
        
        
    }

    public function orderComplete(){

    }



    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['index','payment','confirm','addComplete']);
    }
}
