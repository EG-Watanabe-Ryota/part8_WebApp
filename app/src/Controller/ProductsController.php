<?php
// src/Controller/ProductsController.php

namespace App\Controller;

class ProductsController extends AppController
{
    public function index(){
        $this->loadComponent('Paginator');
        $category='all';      
        //セッション周り
        $session = $this->getRequest()->getSession();
        // $session->destroy();
        if ($this->getRequest()->isPost()) {
            // Post送信の場合の処理
            if( isset($_POST['post'])){
                $category = $_POST['post'];
                $result = $this->Products->find()->where(["category like " => '%' . $category . '%']);
                $products = $this->Paginator->paginate($result);
                $this->set(compact('products','category'));
            }


            if( isset($_POST['product_name']) && isset($_POST['quantity']) && isset($_POST['price']) && isset($_POST['img'] )){
                $product_name=$_POST['product_name'];
                $quantity=$_POST['quantity'];
                $price=$_POST['price'];
                $img=$_POST['img'];
                $id=$_POST['id'];

                if ($session->check('carts')) {
                    $items = $session->read('carts');
                }
                
                $items[] = ['id' =>$id,
                            'product_name' =>$product_name,
                            'quantity'=> $quantity,
                            'price' => $price,
                            'img' => $img];
                
                //Session::write($key, $value)
                $session->write('carts',$items);
                // debug($session->read('carts'));
                $this->redirect(['controller' => 'Carts', 'action' => 'index']);
            }
            // $products = $this->Paginator->paginate($this->Products->find());

    
        } else {
            // Post送信ではない場合の処理
            $products = $this->Paginator->paginate($this->Products->find());
            $this->set(compact('products','category'));
        }
        
        
    }

    public function detail($id = null){
        $product = $this->Products->findById($id)->firstOrFail();
        $this->set(compact('product'));

        //セッション周り
        $session = $this->getRequest()->getSession();
        //$session->destroy();
        if ($this->getRequest()->isPost()) {
            // Post送信の場合の処理
            $product_name=$_POST['product_name'];
            $quantity=$_POST['quantity'];
            $price=$_POST['price'];
            $img=$_POST['img'];
            
            
            if ($session->check('carts')) {
                $items = $session->read('carts');
            }
            
            $items[] = ['product_name' =>$product_name,
                        'quantity'=> $quantity,
                        'price' => $price,
                        'img' => $img];
            
            //Session::write($key, $value)
            $session->write('carts',$items);
            debug($session->read('carts'));

    
        } else {
    
            // Post送信ではない場合の処理
    
        }

    }
    //検索結果のページ表示
    public function find() {
        $session = $this->getRequest()->getSession();
        if ($this->request->is('post')) {
            $find = $_POST['find'];
            //POST送信された文字列でProductsテーブル内を検索
            $products = $this->Products->find()->where(["category like " => '%' . $find . '%']);
            $count = $products->count();

            // $product_name=$_POST['product_name'];
            // $quantity=$_POST['quantity'];
            // $price=$_POST['price'];
            // $img=$_POST['img'];
            
            
            // if ($session->check('carts')) {
            //     $items = $session->read('carts');
            // }
            
            // $items[] = ['product_name' =>$product_name,
            //             'quantity'=> $quantity,
            //             'price' => $price,
            //             'img' => $img];
            
            //Session::write($key, $value)
            // $session->write('carts',$items);
            // debug($session->read('carts'));
        }    
        $this->set(compact('products','find','count'));

        
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['index','detail','find']);
    }


}