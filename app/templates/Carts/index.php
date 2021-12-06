<?php
    echo $this->Html->css('carts');
?>

<html>
    <body>
    　　<h1>ショッピングカート</h1>
    　　<table style="text-align=center;">
            <tr><th>商品名</th><th>商品画像</th><th>価格(税込)</th><th>数量</th><th>変更ボタン</th><th>削除ボタン</th><th>小計</th><tr>
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
                        <form action="" method="POST">
                            <td>
                                <input type="number" name="quantity"   min='0' style="width:62px; height:27px; background-color:white;" value='<?=$items[$i]['quantity']?>'/>
                            </td>
                            <td>
                                <input type="hidden" name="kind" value="change">
                                <input type="hidden" name="index" value=<?=$i?>>
                                <input type="hidden" name="name" value=<?=$items[$i]['product_name']?>>
                                <input type="hidden" name="price" value=<?=$items[$i]['price']?>>
                                <input type="hidden" name="img" value=<?=$items[$i]['img']?>>
                                <input type="hidden" name="_csrfToken" autocomplete="off" value="<?= $this->request->getAttribute('csrfToken') ?>">
                                <input type="submit" value="変更">
                            </td>
                        </form>
                        
                        <form action="" method="POST">
                            <td>
                                <input type="hidden" name="kind" value="delete">
                                <input type="hidden" name="index" value=<?=$i?>>
                                <input type="hidden" name="_csrfToken" autocomplete="off" value="<?= $this->request->getAttribute('csrfToken') ?>">
                                <input type="submit" value="削除">
                            </td>
                        </form>
                        <td style="text-align=center">
                            <?=h($items[$i]['price']*$items[$i]['quantity']);?>円
                        </td>
                    </tr>　　　
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if(!($items)):?>
                <td>カートの中は空です</td>
            <?php endif; ?>
    　　</table>
        <?php if($items):?>
            <p>合計金額は<?=h($total)?>円です</p>
                <p>上記の内容でよろしければ「購入手続きへ」ボタンをクリックしてください。</p>
            <div class='btn_next'>
            <?php if($islogin):?>
                <button><a href='/orders/confirm'>購入手続きへ</a></button>
            <?php else:?>
                <button><a href='/orders/index'>購入手続きへ</a></button>
            <?php endif; ?>
                </div>
        <?php endif; ?>
    </body>
</html> 