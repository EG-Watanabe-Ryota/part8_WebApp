<html>
　<body>
　　<h1>ショッピングカート</h1>
　　<p><a href="/products/index.php">商品一覧へ</a><p>
　　<table style="text-align=center">
        <tr><th>商品</th><th>価格(税込)</th><th>数量</th><th>小計</th><th>変更ボタン</th><th>削除ボタン<th><th>注文確定ボタン<th><tr>
        <?php $total=0;?>
        <?php if($items):?>
            <?php for($i=0; $i<count($items); $i++):?>
                <?php $total+=$items[$i]['price']*$items[$i]['quantity'];?>
                
                <tr>
                    <td>
                        <?=h($items[$i]['product_name']);?>
                    </td>
                    <td>
                        <?=h($items[$i]['price']);?><p>円</p>
                    </td>
                    <form action="" method="POST">
                        <td>
                            <input type="number" name="quantity"   min='0' value='<?=$items[$i]['quantity']?>'/>
                        </td>
                        <td>
                        <?=h($items[$i]['price']*$items[$i]['quantity']);?><p>円</p>
                    </td>
                        <td>
                            <input type="hidden" name="kind" value="change">
                            <input type="hidden" name="index" value=<?=$i?>>
                            <input type="hidden" name="name" value=<?=$items[$i]['product_name']?>>
                            <input type="hidden" name="price" value=<?=$items[$i]['price']?>>
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
                </tr>　　　
            <?php endfor; ?>
        <?php endif; ?>
        <?php if(!($items)):?>
            <td>カートの中は空です</td>
        <?php endif; ?>
　　</table>
    <p>合計金額は<?=h($total)?>円です</p>
　</body>
</html> 