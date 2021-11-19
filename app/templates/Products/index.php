<!-- File: templates/Product/index.php -->

<h1>商品一覧</h1>
<table>
    <tr>
        <th>商品画像</th>
        <th>商品名</th>
        <th>販売価格</th>
        <th>販売日</th>
    </tr>

    <!-- ここで、$goods_muster クエリーオブジェクトを繰り返して、記事の情報を出力します -->

    <?php foreach ($products as $product): ?>
    <tr>
        <td>
            nasi
        </td>
        <td>
            <?= h($product->product_name) ?>
        </td>
        <td>
            <?= h($product->product_price) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>