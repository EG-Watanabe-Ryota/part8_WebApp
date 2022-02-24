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

        $orders = TableRegistry::getTableLocator()->get('Orders');
        $orders_query = $orders->find()->where(['customer_id' => $customer->id]);
        $count = $orders_query->count();
        $this->set(compact('orders_query', 'count'));
    }

    public function edit()
    {
        $result = $this->Authentication->getResult();
        $customer = $result->getData();
        // debug($customer);
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
        // debug($data);
        $CustomersTable=TableRegistry::getTableLocator()->get('Customers');
        $customer = $CustomersTable->get($customer->id);
        $customer = $CustomersTable->patchEntity($customer, $data);
        if ($CustomersTable->save($customer)) {
            $this->redirect(['controller' => 'Mypage', 'action' => 'edit']);
        }
    }
}
