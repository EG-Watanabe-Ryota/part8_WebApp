<?php
// src/Controller/CartsController.php

namespace App\Controller;

class CartsController extends AppController
{
    public function index(){
        if(!isset($_SESSION)){
            session_start();
        }
    
        $session = $this->getRequest()->getSession();
    
        debug($session->read('carts'));
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['index']);
    }
}
?>