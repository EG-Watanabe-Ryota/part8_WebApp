<?php
    echo $this->Html->css('template');
    echo $this->Html->css('products');
?>


<div class='main-content'>
        <div class='category_bar'>
            <div class='order_history'>
            <a href="<?= $this->Url->build(["controller" => "Mypage", "action" => "index"]) ?>" 
                        class="btn register_btn" type='button'><span><i class="fas fa-history "></i></span>注文履歴</a>
            </div>

            <div class='customer_conf'>
            <a href="<?= $this->Url->build(["controller" => "Mypage", "action" => "edit"]) ?>" 
                        class="btn register_btn" type='button'><span><i class="fas fa-user-cog"></i></span>会員登録内容変更</a>
            </div>
        </div>


        <div class="product_wrapper">
            <h2>会員登録情報変更</h2>
            <h3>この内容で良ければ確定ボタンを押してください</h3>
            <table>
                <?= $this->Form->create(null,['url' => ['controller' => 'Mypage','action' => 'complete']]); ?>
                <tr><th>名前</th><td><?=h($customer['name'])?></td></tr>
                <tr><th>性別</th><td><?=h($customer['gender'])?></td></tr>
                <tr><th>郵便番号</th><td><?=h($customer['postal_code'])?></td></tr>
                <tr><th>住所</th><td><?=h($customer['address'])?></td></tr>
                <tr><th>電話番号</th><td><?=h($customer['tel'])?></td></tr>
            </table>
            <?php foreach($customer as $key => $val):?>
                    <input type="hidden" name=<?=h($key)?> value=<?=h($val)?>>
                <?php endforeach;?>
            <?= $this->Form->submit('確定'); ?>
            <?= $this->Form->end(); ?>
        </div>
</div>