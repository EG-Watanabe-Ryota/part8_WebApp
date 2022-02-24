<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class CustomersController extends AppController
{
    public function index()
    {
        $customer = $this->Authentication->getIdentity();
        // debug($customer);
        exit;
    }

    public function view()
    {
    }

    public function mypage()
    {
    }

    public function add()
    {
        $customer = $this->Customers->newEmptyEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('customer', $customer);
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['login', 'logout', 'add']);
    }

    public function login()
    {
        $result = $this->Authentication->getResult();
        

        // 認証成功
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/customers/index';
            // return $this->redirect($target);
            return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
        }
        // ログインできなかった場合
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
    }
}
