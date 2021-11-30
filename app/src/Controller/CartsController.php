<?php
// src/Controller/CartsController.php

namespace App\Controller;

class CartsController extends AppController
{
    public function index(){
        $session = $this->getRequest()->getSession();
    
        //debug($session->read('carts'));
        

        $items = $session->read('carts');
        $this->set(compact('items'));

        

        //カート内編集機能
        if ($this->getRequest()->isPost()) {
            //削除機能
            if( $_POST['kind'] === 'delete' || ($_POST['kind'] === 'change' && $_POST['quantity'] === '0')){
                $i = $_POST['index'];
                unset($_SESSION['carts'][(int)$i]);
                $this->redirect(['controller'=>'carts','action'=>'index']);
            }
            //数量更新機能
            else if( $_POST['kind'] === 'change'){
                $i = $_POST['index'];
                $_SESSION['carts'][(int)$i]['quantity'] = $_POST['quantity'];
                $this->redirect(['controller'=>'carts','action'=>'index']);
            }
        }
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['index']);
    }
}
?>