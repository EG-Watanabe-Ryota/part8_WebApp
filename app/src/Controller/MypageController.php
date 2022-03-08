<?php
// src/Controller/ProductsController.php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class MypageController extends AppController
{
    public function index()
    {
        $result = $this->Authentication->getResult();
        $customer = $result->getData();

        $ordersTable = TableRegistry::getTableLocator()->get('Orders');
        $orders = $ordersTable->find()->where(['customer_id' => $customer->id]);
        $count = $orders->count();
        $this->set(compact('orders', 'count'));
    }

    public function edit()
    {
        $result = $this->Authentication->getResult();
        $customer = $result->getData();
        $this->set(compact('customer'));
    }

    public function confirm()
    {
        $customer = $_POST;
        $this->set(compact('customer'));
    }

    public function complete()
    {
        $result = $this->Authentication->getResult();
        $customer = $result->getData();
        $post = $_POST;
        $data = ['name' => $post['name'],
                'gender'=> $post['gender'],
                'tel' => (int)$post['tel'],
                'postal_code' => (int)$post['postal_code'],
                'address' => $post['address']];
        $CustomersTable=TableRegistry::getTableLocator()->get('Customers');
        $customer = $CustomersTable->get($customer->id);
        $customer = $CustomersTable->patchEntity($customer, $data);
        if ($CustomersTable->save($customer)) {
            $this->redirect(['controller' => 'Mypage', 'action' => 'edit']);
        }
    }
}
