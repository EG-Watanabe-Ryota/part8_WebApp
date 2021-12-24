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
            <a href="<?= $this->Url->build(["controller" => "Mypage", "action" => "customer_conf"]) ?>" 
                        class="btn register_btn" type='button'><span><i class="fas fa-user-cog"></i></span>会員登録内容変更</a>
            </div>
        </div>


        <div class="product_wrapper">
            <h2>購入履歴</h2>
            <p> 件の購入履歴があります</p>
            <table>
                <tr><th>購入日</th><th>注文番号</th><th>合計金額</th><th>注文ステータス</th><th>注文詳細</th></tr>
                <?php foreach($orders_query as $row):?>
                    <div class='history'>
                        <tr>
                            <!-- 購入日 -->
                            <td>2021/12/22</td>

                            <!-- 注文番号 -->
                            <td><?=h($row->id)?></td>

                            <!-- 合計金額 -->
                            <td>1220円</td>

                            <!-- 注文 -->
                            <td>発送準備中</td>

                            <td><button>注文詳細</button></td>
                        </tr>
                    </div>
            <?php endforeach;?>
            </table>
        </div>
</div>