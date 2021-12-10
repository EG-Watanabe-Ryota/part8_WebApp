<?php
// src/Controller/ProductsController.php

namespace App\Controller;

use Cake\ORM\TableRegistry;

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
    public function payment(){
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
        //debug
        // foreach ( $payment_methods as $key => $valu) {
        //    debug($payment_methods[$key]);
        // }
        $this->set(compact('payment_methods'));
        //postで渡す方法でやるかセッションで持たせるのもアリ
        
    }


    public function confirm(){
        //セッションの破棄を忘れずに！！！！

        //ログイン判定
        $result = $this->Authentication->getResult();

        //ログインしているユーザー情報をもってくる
        $customer = $result->getData();
        // debug($customer->id);
        $islogin = false;
        //ログイン時の処理
        if($result->isValid()){
            //ログインしてた変数を真にする
            $islogin = true;

            //前のページでPOSTで送信してもらった支払い方法選択の情報を回収
            $method_result = $_POST['payment'];
            debug($method_result);
            //DB処理(customers)
            $customers = TableRegistry::getTableLocator()->get('customers');
            $customers_query = $customers->find()->where(['id' => $customer->id]);
            foreach ($customers_query as $row) {
                $id=$row->id;
                $name=$row->name;
                $postal_code=$row->postal_code;
                $address=$row->address;
                $tel=$row->tel;
            }
            $this->set(compact('name','postal_code','address','tel'));
        }
        
        $this->set(compact('islogin'));

        //セッション処理
        $session = $this->getRequest()->getSession();
        //ゲストの情報を読み込む
        $guest=$session->read('guest');
        //都道府県判定(穏やかな比較でも問題ないので、switchを使う)
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
        //ビューにゲストの情報を格納した変数を渡す
        $this->set(compact('guest'));

        //カート内の情報を読み込む
        $items = $session->read('carts');
        $this->set(compact('items'));

        
        

        //payments
        // $payments = TableRegistry::getTableLocator()->get('payments');
        // $payments_query = $payments->find();
        

    }



    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['index','payment','confirm']);
    }


}