<?php
// src/Controller/ProductsController.php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class MypageController extends AppController
{
    public function index(){
        $result = $this->Authentication->getResult();
        $customer = $result->getData();

        $orders = TableRegistry::getTableLocator()->get('Orders');
        $orders_query = $orders->find()->where(['customer_id' => $customer->id]);
        $this->set(compact('orders_query'));
    }

    public function edit(){
        $result = $this->Authentication->getResult();
        $customer = $result->getData();

        $orders = TableRegistry::getTableLocator()->get('Orders');
        $orders_query = $orders->find()->where(['customer_id' => $customer->id]);
        $this->set(compact('orders_query'));
    }
}
?>