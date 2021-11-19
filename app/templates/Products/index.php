<?php
    echo $this->Html->css('header');
?>

<header>
    <h1>Nabe</h1>
    <div class='new_member'>

    </div>

    <div class='login'>

    </div>

    <div class='cart'>

    </div>

    <div class='header_bar'>
        <ul>
            <li>HOME</li>
            <li>カテゴリ</li>
            <li>カテゴリ</li> 
            <li>カテゴリ</li>                                                    
        </ul>
    </div>
</header>

<div class='main-content'>
        <div class='category_bar'>
            <p>全てから探す</p>
        </div>

        <div class="product_wrapper">
            <p>TOP>ステンレス</p>
            <h2>ステンレス</h2>
            <hr>
            <div class='products'>
            <?php foreach($products as $product):?>
                <div class='product'>
                    <?php echo $this->Html->image(h($product->product_img),['width' => '257px','height' => '241px']); ?>
                    <p><?= h($product->product_name) ?></p>
                    <p>￥<?= h($product->product_price) ?></p>
                    <?= $this->Html->link('商品詳細', ['action' => 'detail', $product->product_id]) ?>
                    <p>数量<p>
                    <button><a href="">商品詳細</a></button>
                </div>
            <?php endforeach; ?>
            </div>
            
        </div>
</div>