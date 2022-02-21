<?php
// src/Controller/ProductsController.php

namespace App\Controller;

class ProductsController extends AppController
{
    public $paginate = [
		'limit' => 6 // 1ページに表示するデータ件数
	];
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index()

    {
        $products = $this->Products->find();
        $products_data = $products->toArray();
        $this->set('products', $this->paginate($products));
        $this->set(compact('products_data'));

    }

    public function add()
    {
        
        if ($this->request->is('post')) {
            /*拡張子チェック*/
            // $fileName = $_FILES['image']['name'];
            // if (!empty($fileName)) {
            //     $ext = substr($fileName, -3);
            //     if($ext != 'jpg' && $ext != 'gif' && $ext != 'png'){
            //         $error['image'] = 'type';
            //     }
            // }
            $image_name =$_FILES['image']['name'];
            $myFile = $this->request->getData('image');
            $name = $myFile->getClientFilename();
            $path = '/var/www/app/webroot/img/' . $image_name;
            $myFile->moveTo($path);
            $new_data = $this->request->getData();

            $product = $this->Products->newEntity($this->request->getData());

            $product->img = $image_name;
            $product->name = $new_data['name'];
            

            if ($this->Products->save($product)) {
                $this->Flash->success(__('登録完了！'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        // $this->viewBuilder()->setLayout('side_menu_none');
    }

    public function edit($product_id)
    {
        $product = $this->Products->get($product_id);
        $status = ['ステータスを入力' => 'ステータスを入力',
                    '販売中' => '販売中',
                    '販売停止中' => '販売停止中',
                    '販売予告' => '販売予告',
                    '在庫切れ' => '在庫切れ'];

        $this->set(compact('product','status'));
    }

    public function confirm()
    {
        debug($_POST);
        
        if ($this->request->is('post')) 
        {
            //$_POSTをforeachあたりで回して、idでproductsテーブルから該当レコードを引っ張ってきて、全一致なら$productにnullを入れ、そうでないなら$_POSTを入れる

            //POSTがあるなら変数に格納
            $product = $_POST;
        }

        $this->set(compact('product'));
        
    }

    public function editAdd()
    {
        $post = $_POST;
        $data = ['id'   => (int)$post['id'],
                'img'   => $post['img'],
                'name'  => $post['name'],
                'stock' => $post['stock'],
                'price' => $post['price'],
                'category' => $post['category'],
                'status'=> $post['status']];
        
        $products = $this->Products->find();
        $product = $this->Products->get($data['id']);
        $product = $this->Products->patchEntity($product, $data);

        if($this->Products->save($product)){
            $this->redirect(['controller' => 'products', 'action' => 'editComplete']);
        } else {
            $this->redirect(['controller' => 'products', 'action' => 'editFaild']);
        }

       
    }

    public function editComplete()
    {

    }

    public function editFaild()
    {

    }
}

