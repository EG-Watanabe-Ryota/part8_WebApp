
<?php if(isset($product)):?>
    <h1>以下の内容でよろしければ登録ボタンを押してください</h1>
    <div class="table-responsive">
　　<table class="table table-condensed">
    　　  <thead>
            <tr class="table-primary">
                
                
                <?= $this->Form->create(null,['url' => ['controller' => 'products','action' => 'edit_add']]); ?>
                <th>商品番号</th>
                <th>商品画像</th>
                <th>商品名</th>
                <th>価格(税込)</th>
                <th>カテゴリ</th>
                <th>在庫</th>
                <th>販売ステータス</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <th><?= h($product['id']) ?></th>
                    <input name="id" type="hidden" value=<?=h($product['id'])?>>
                    <td><img src=<?='http://localhost:8080/img/' . h($product['img'])?> width="60px" height="60px"></td>
                    <input name="img" type="hidden" value=<?=h($product['img'])?>>
                    <td><?=h($product['name'])?> </td>
                    <input name="name" type="hidden" value=<?=h($product['name'])?>>
                    <td><?=h($product['price'])?>円</td>
                    <input name="price" type="hidden" value=<?=h($product['price'])?>>
                    <td><?=h($product['category'])?></td>
                    <input name="category" type="hidden" value=<?=h($product['category'])?>>
                    <td><?=h($product['stock'])?>個</td>
                    <input name="stock" type="hidden" value=<?=h($product['stock'])?>>
                    <th><?=h($product['status'])?></th>
                    <input name="status" type="hidden" value=<?=h($product['status'])?>>
                </tr>
        </tbody>
　　</table>
<div>
    <?= $this->Form->submit('登録',['class' => "btn btn-primary"]); ?>
    <?= $this->Form->end(); ?>
<?php else:?>
    <h1>編集した箇所はありません</h1>   
<?php endif;?>
