<?php
    echo $this->Html->css('template');
    echo $this->Html->css('products');
?>


<div class='main-content'>
        <div class='category_bar'>
            <div class='order_history'>
            <a href="<?= $this->Url->build(["controller" => "orders", "action" => "cart"]) ?>" 
                        class="btn register_btn" type='button'><span><i class="fas fa-history "></i></span>注文履歴</a>
            </div>

            <div class='customer_conf'>
            <a href="<?= $this->Url->build(["controller" => "orders", "action" => "cart"]) ?>" 
                        class="btn register_btn" type='button'><span><i class="fas fa-user-cog"></i></span>会員登録内容変更</a>
            </div>

        </div>