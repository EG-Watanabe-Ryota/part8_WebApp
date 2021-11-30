<html>
　<body>
　　<h1>ショッピングカート</h1>
　　<p><a href="/products/index.php">商品一覧へ</a><p>
　　<table style="text-align=center">
　　　<tr><th>商品</th><th>個数</th><th>数量</th><th>変更ボタン</th><th>削除ボタン<th><tr>
　　　<?php foreach($cart as $key=>$var): ?>
　　　　<tr>
　　　　　<td>
　　　　　　<?=h($key);?>
　　　　　</td>
　　　　　<td>
　　　　　　<?= h($var); ?>
　　　　　</td>
　　　　　<form action="" method="POST">
　　　　　　<td>
                <input type="number" name="quantity"  min=<?=$var?> />
　　　　　　</td>
　　　　　　<td>
　　　　　　　<input type="hidden" name="kind" value="change">
　　　　　　　<input type="hidden" name="product" value=<?=$key;?>>
　　　　　　　<input type="submit" value="変更">
　　　　　　</td>
　　　　　</form>
　　　　　<form action="" method="POST">
　　　　　　<td>
　　　　　　　<input type="hidden" name="kind" value="delete">
　　　　　　　<input type="hidden" name="product" value=<?=$key;?>>
　　　　　　　<input type="submit" value="削除">
　　　　　　</td>
　　　　　</form>
　　　　</tr>
　　　<?php endforeach; ?>
　　</table>
　</body>
</html> 