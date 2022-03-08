<?php
// src/Controller/CartsController.php

namespace App\Controller;

class CartsController extends AppController
{
    public function index()
    {
        $session = $this->getRequest()->getSession();
        $items = $session->read('carts');
        $this->set(compact('items'));

        //カート内編集機能
        if ($this->getRequest()->isPost()) {
            //削除機能
            if ($_POST['kind'] === 'delete' || ($_POST['kind'] === 'change' && $_POST['quantity'] === '0')) {
                $i = $_POST['index'];
                $session->delete("carts.${i}");
                $this->redirect(['controller'=>'carts', 'action'=>'index']);
            } else if ($_POST['kind'] === 'change') { //数量更新機能
                $i = $_POST['index'];
                $items =['product_name' =>$_POST['name'],
                        'quantity'=> $_POST['quantity'],
                        'price'=>$_POST['price'],
                        'img' => $_POST['img']];

                $session->write("carts.${i}",$items);
                $this->redirect(['controller'=>'carts', 'action'=>'index']);
            }
        }
        //ログイン判定
        $result = $this->Authentication->getResult();
        $islogin = false;
        if ($result->isValid()) {
            $islogin = true;
        }
        $this->set(compact('islogin'));
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['index']);
    }
}
