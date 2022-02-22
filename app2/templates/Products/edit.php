


<div class="table-responsive">
　　<table class="table table-condensed">
    　　  <thead>
            <tr class="table-primary">
                
                
                <?= $this->Form->create(null,['url' => ['controller' => 'products','action' => 'confirm']]); ?>
                <th>商品番号</th>
                <th>商品画像</th>
                <th>商品名</th>
                <th>価格(円税込)</th>
                <th>カテゴリ</th>
                <th>在庫(個)</th>
                <th>販売ステータス</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <th><?= h($product->id) ?></th>
                    <input name="id" type="hidden" value=<?=h($product->id)?>>
                    <td><img src=<?= 'http://localhost:8080/img/' . h($product->img)?> width="60px" height="60px"></td>
                    <input name="img" type="hidden" value=<?=h($product->img)?>>
                    <td><?= $this->Form->text('name', ['value' => h($product->name),'class' => 'form-control']) ?></td>
                    <td><?=  $this->Form->control('price', ['type' => 'number','value' => h($product->price),'required' => false,'label' => false,'class' => 'form-control'])?></td>
                    <td><?= $this->Form->text('category', ['value' => h($product->category),'class' => 'form-control']) ?></td>
                    <td><?=  $this->Form->control('stock', ['type' => 'number','value' => h($product->stock),'required' => false,'label' => false,'class' => 'form-control'])?></td>
                    <th><?= $this->Form->select('status', $status,['default' => h($product->status),'class' => 'form-control'])?></th>
                </tr>
        </tbody>
　　</table>
<div>
<div class="btn-toolbar">
<div class="btn-group">
<?= $this->Form->submit('確認画面へ',['class' => "btn btn-primary"]); ?>
<?=$this->Form->button('商品ページに戻る', ['type' => 'button','class' => "btn btn-secondary"])?>
</div>
</div>
<?= $this->Form->end(); ?>

