


<div class="table-responsive">
　　<table class="table table-condensed">
    　　  <thead>
            <tr>
                
                
                <?= $this->Form->create(null,['url' => ['controller' => 'products','action' => 'confirm']]); ?>
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
                    <th><?= h($product->id) ?></th>
                    <input name="id" type="hidden" value=<?=h($product->id)?>>
                    <td><img src=<?= 'http://localhost:8080/img/' . h($product->img)?> width="60px" height="60px"></td>
                    <input name="img" type="hidden" value=<?=h($product->img)?>>
                    <td><?= $this->Form->text('name', ['value' => h($product->name)]) ?></td>
                    <td><?=  $this->Form->control('price', ['type' => 'number','value' => h($product->price),'required' => false,'label' => false])?>円</td>
                    <td><?= $this->Form->text('category', ['value' => h($product->category)]) ?></td>
                    <td><?=  $this->Form->control('stock', ['type' => 'number','value' => h($product->stock),'required' => false,'label' => false])?>個</td>
                    <th><?= $this->Form->select('status', $status,['default' => h($product->status)])?></th>
                </tr>
        </tbody>
　　</table>
<div>
<?= $this->Form->submit('確認画面へ'); ?>
<?= $this->Form->end(); ?>

