<?php
// src/Controller/ProductsController.php

namespace App\Controller;

class ProductsController extends AppController
{
    public function add(){
        
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
}

//$_FILES['image']['tmp_name']
//date('YmdHis')　日付はこれはこれでほしいのでどこかで実装する