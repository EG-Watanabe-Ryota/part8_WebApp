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
            <table>
                <?= $this->Form->create(null,['url' => ['controller' => 'Mypage','action' => 'confirm']]); ?>
                <tr><th>名前</th><td><?=$this->Form->text('name', ['value' => h($customer['name'])])?></td></tr>
                <tr><th>性別</th><td><?=$this->Form->radio(
    'gender',
    [
        ['value' => '男', 'text' => '男', 'style' => 'color:red;'],
        ['value' => '女', 'text' => '女', 'style' => 'color:blue;'],
    ]
);?></td></tr>
                <tr><th>郵便番号</th><td><?=$this->Form->text('postal_code', ['value' => h($customer['postal_code'])])?></td></tr>
                <tr><th>住所</th><td><?=$this->Form->text('address', ['value' => h($customer['address'])])?></td></tr>
                <tr><th>電話番号</th><td><?=$this->Form->text('tel', ['value' => h($customer['tel'])])?></td></tr>

            </table>

            <?= $this->Form->submit('確認画面へ'); ?>
            <?= $this->Form->end(); ?>
        </div>
</div>