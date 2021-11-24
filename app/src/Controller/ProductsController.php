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
    }

    public function detail($id = null){
        $product = $this->Products->findById($id)->firstOrFail();
        $this->set(compact('product'));

    }

}