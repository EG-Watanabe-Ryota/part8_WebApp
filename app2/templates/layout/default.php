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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    

<link rel="stylesheet" href="/webroot/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">


<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="/webroot/js/bootstrap.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>

<!-- drawer.css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.1/css/drawer.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
<!-- drawer.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.1/js/drawer.min.js"></script>


<?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <!-- <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?> -->
    <!-- Bootstrap の CSS -->
    <?= $this->Html->css('bootstrap.min.css') ?>
    <!-- jQuery -->
    <?= $this->Html->script('jquery-3.6.0.min.js') ?>
    <!-- Bootstrap の JS -->
    <?= $this->Html->script('bootstrap.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?= $this->Html->css(['page']) ?>
</head>
<?php
    echo $this->Html->css('navi');
?>

<div id="nav-drawer">
  <input id="nav-input" type="checkbox" class="nav-unshown">
  <label class="nav-unshown" id="nav-close" for="nav-input"></label>
  <div id="nav-menu">
    <div class="nav-button"><label id="nav-open" for="nav-input"><span></span></label></div>
    <div class="content">
      <div class="dropdown">
    <button type="button" id="dropdown1"
        class="btn btn-secondary dropdown-toggle"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false">
      商品管理
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdown1">
      <a class="dropdown-item" href="/products/add">商品登録</a>
      <a class="dropdown-item" href="/products/index">商品ページ</a>
    </div>

    <a class="dropdown-item" href="/orders/index">注文管理</a>


</div>
    </div>
  </div>
</div>

<style>
    input[type="number"] {
    width: 100px;
  }

  ul {
    list-style: none;
  }
</style>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">管理アプリ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link " aria-current="page" href="#">オンラインマニュアル</a>
        <a class="nav-link " href="#">お問い合わせ</a>
        <a class="nav-link " href="#">Links</a>
        <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
      </div>
    </div>
  </div>
</nav>
</div>
    
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
