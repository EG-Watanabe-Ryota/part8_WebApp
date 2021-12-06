<?php
// src/Controller/ProductsController.php

namespace App\Controller;

class OrdersController extends AppController
{
    //未ログイン時に遷移(フォーム入力)
    public function index(){

    }

    public function payment(){

    }
    //ログイン時に遷移(支払い方法選択画面)
    public function logged_in_payment(){

    }
    
    public function confirm(){

    }



    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['index']);
    }


}