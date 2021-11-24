<?php
// src/Controller/CustomersController.php

namespace App\Controller;

class CustomersController extends AppController
{
    public function index(){
        $this->set('customers', $this->Customers->find('all'));
    }

    public function view($id)
    {
        $customer = $this->Customers->get($id);
        $this->set(compact('customer'));
    }

    public function add()
    {
        $customer = $this->Customers->newEmptyEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the customer.'));
        }
        $this->set('customer', $customer);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);
    // ログインアクションを認証を必要としないように設定することで、
    // 無限リダイレクトループの問題を防ぐことができます
    $this->Authentication->addUnauthenticatedActions(['login']);
}

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // POSTやGETに関係なく、ユーザーがログインしていればリダイレクトします
        if ($result->isValid()) {
            // ログイン成功後に /article にリダイレクトします
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Articles',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // ユーザーの送信と認証に失敗した場合にエラーを表示します
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        }
    }

}