<?php if($islogin):?>
    <!-- ユーザーが会員(ログイン済み)のとき -->
    <p>あなたは会員(ログイン済み)です</p>
    <p>注文した商品は以下になります。</p><br>
    <table style="text-align=center;">
        <tr><th>商品名</th><th>商品画像</th><th>価格(税込)</th><th>数量</th><th>小計</th><tr>
        <?php $total=0;?>
        <?php if($items):?>
            <?php foreach($items as $i=>$val):?>
                <?php $total+=$items[$i]['price']*$items[$i]['quantity'];?>
                <tr>
                    <td>
                        <?=h($items[$i]['product_name']);?>
                    </td>
                    <td>
                        <?=$this->Html->image(h($items[$i]['img']),['width' => '137px','height' => '121px'])?>
                    </td>
                    <td>
                        <?=h($items[$i]['price']);?>円
                    </td>
                    <td>
                        <?=h($items[$i]['quantity']);?>個
                    </td>
                    <td style="text-align=center">
                        <?=h($items[$i]['price']*$items[$i]['quantity']);?>円
                    </td>
                </tr>　　
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
    <?php if($items):?>
        <p>合計金額は<?=h($total)?>円です</p>
    <?php endif; ?>

    <br><p>以下の登録済みのお届け先に届けられます</p><br>
    <p>氏名</p>
    <p><?=h($name)?></p>
    <!-- ハイフン処理忘れないように -->
    <p>郵便番号</p>
    <p><?=h($postal_code)?></p>
    <p>住所</p>
    <p><?=h($address)?></p>
    <!-- ハイフン処理忘れないように -->
    <p>電話番号</p>
    <p><?=h($tel)?></p>

<?php else:?>
    <!-- ユーザーがゲストのときの処理 -->
    <!-- セッションの破棄を忘れずに！！！！ -->
    <p>あなたはゲストです</p>
    <p>注文した商品は以下になります。</p><br>
    <table style="text-align=center;">
        <tr><th>商品名</th><th>商品画像</th><th>価格(税込)</th><th>数量</th><th>小計</th><tr>
        <?php $total=0;?>
        <?php if($items):?>
            <?php foreach($items as $i=>$val):?>
                <?php $total+=$items[$i]['price']*$items[$i]['quantity'];?>
                <tr>
                    <td>
                        <?=h($items[$i]['product_name']);?>
                    </td>
                    <td>
                        <?=$this->Html->image(h($items[$i]['img']),['width' => '137px','height' => '121px'])?>
                    </td>
                    <td>
                        <?=h($items[$i]['price']);?>円
                    </td>
                    <td>
                        <?=h($items[$i]['quantity']);?>個
                    </td>
                    <td style="text-align=center">
                        <?=h($items[$i]['price']*$items[$i]['quantity']);?>円
                    </td>
                </tr>　　
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
    <?php if($items):?>
        <p>合計金額は<?=h($total)?>円です</p>
    <?php endif; ?>

    <br><p>以下の登録済みのお届け先に届けられます</p><br>
    <p>氏名</p>
    <p><?=h($guest['order_name01']) . ' ' . h($guest['order_name02'])?></p>
    <!-- ハイフン処理忘れないように -->
    <p>郵便番号</p>
    <p><?=h($guest['order_zip01']) . '-' . h($guest['order_zip02'])?></p>
    <p>住所</p>
    <p><?=h($guest['order_pref']) . h($guest['order_addr01']) . h($guest['order_addr02'])?></p>
    <!-- ハイフン処理忘れないように -->
    <p>電話番号</p>
    <p><?=h($guest['order_tel01']) . '-' . h($guest['order_tel02'] . '-' . h($guest['order_tel03']))?></p>
<?php endif; ?>