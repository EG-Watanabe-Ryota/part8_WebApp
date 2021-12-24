<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';

    

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?> 

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake','header']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class='header_nav'>
            <h1><?=$this->html->link('Nabe', ['controller' => 'Pages', 'action' => 'display', 'home'])?></h1>
            <div class='nav-icon'>
                <!-- ログイン判定する -->
                <div class='new_member'>    
                    <!-- <i class="fas fa-user-plus"><br>会員登録</i> -->
                    <a href="<?= $this->Url->build(["controller" => "customers", "action" => "add"]) ?>" 
                        class="btn register_btn" type='button'><span><i class="fas fa-user-plus fa-3x"></i></span></a><br>会員登録
                </div>
                
                <div class='login'>
                    <!-- <i class="fas fa-sign-in-alt"><br>ログインへ</i> -->
                    <a href="<?= $this->Url->build(["controller" => "customers", "action" => "login"]) ?>" 
                        class="btn register_btn" type='button'><span><i class="fas fa-sign-in-alt fa-3x"></i></span></a><br>ログイン
                </div>

                <!-- ログインしてたらマイページへ用のアイコンを表示
                <div class='mypage'>
                    <i class="fas fa-user"><br>マイページへ</i>
                </div> -->

                <div class='cart'>
                <!-- <i class="fas fa-shopping-cart"><br>カートへ</i> -->
                    <a href="<?= $this->Url->build(["controller" => "orders", "action" => "cart"]) ?>" 
                        class="btn register_btn" type='button'><span><i class="fas fa-shopping-cart fa-3x"></i></span></a><br>カート
                </div>
            </div>
        </div>
        <div class='header_bar'>
            <ul style='list-style: none;'>
                <li>HOME</li>
                <li>カテゴリ</li>
                <li>お問い合わせ</li> 
                <li>カテゴリ</li>                                                    
            </ul>
        </div>
    </header>
    

    
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>


<!-- $this->Html->image("recipes/6.jpg", [
    "alt" => "Brownies",
    'url' => ['controller' => 'Recipes', 'action' => 'view', 6]
]); -->
