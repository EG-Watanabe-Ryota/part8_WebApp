<?php
// src/Controller/ProductsController.php

namespace App\Controller;

class ProductsController extends AppController
{
    public function index(){
        $this->loadComponent('Paginator');
        $products = $this->Paginator->paginate($this->Products->find());

        /**compact()コントローラーで用いてる複数の変数をまとめて配列を作ってviewに受け渡せる(ここではproductsを$productsとしてviewに渡している)
         * set()はviewに変数を渡す関数**/
        $this->set(compact('products'));
        
        //セッション周り
        $session = $this->getRequest()->getSession();
        //$session->destroy();
        if ($this->getRequest()->isPost()) {
            // Post送信の場合の処理
            $product_name=$_POST['product_name'];
            $quantity=$_POST['quantity'];
            
            
            if ($session->check('carts')) {
                $items = $session->read('carts');
            }
            
            $items[] = ['product_name' =>$product_name,'quantity'=> $quantity];
            
            //Session::write($key, $value)
            $session->write('carts',$items);
            debug($session->read('carts'));

    
        } else {
    
            // Post送信ではない場合の処理
    
        }


        
        

       

        
    }

    public function detail($id = null){
        $product = $this->Products->findById($id)->firstOrFail();
        $this->set(compact('product'));

    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['index','detail']);
    }


}