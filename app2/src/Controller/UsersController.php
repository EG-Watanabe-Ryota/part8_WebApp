<?php
declare(strict_types=1);

namespace App\Controller;

class UsersController extends AppController
{
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
            $target = $this->Authentication->getLoginRedirect() ?? '/products/index';
            return $this->redirect($target);
        }
        // ログインできなかった場合
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['action' => 'login']);
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }
}
