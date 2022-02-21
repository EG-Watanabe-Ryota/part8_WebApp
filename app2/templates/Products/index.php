


<div class="table-responsive">
　　<table class="table table-condensed">
    　　  <thead>
            <tr>
                
                <!-- <th><button id="btn">全選択/全解除</button>選択box</th> -->
                <?= $this->Form->create(); ?>
                <th>商品番号</th>
                <th>商品画像</th>
                <th>商品名</th>
                <th>価格(税込)</th>
                <th>カテゴリ</th>
                <th>在庫</th>
                <th>販売ステータス</th>
                <th>編集ボタン<th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products_data as $product):?>
                <tr>
                    <!-- <th><?= $this->Form->checkbox('chk[]',['value' => h($order->id),'class' => "checks"]) ?></th> -->
                    <th><?= h($product->id) ?></th>
                    <td><img src=<?= 'http://localhost:8080/img/' . h($product->img)?> width="60px" height="60px"></td>
                    <td><?= h($product->name) ?></td>
                    <td><?= h($product->price) ?>円</td>
                    <th><?=h($product->category)?></th>
                    <th><?=h($product->stock)?></th>
                    <th><?=h($product->status)?></th>
                    <th><?=$this->Html->link(
                        '編集',
                        ['controller' => 'products', 'action' => 'edit', $product->id],
                        ['class' => 'btn btn-outline-primary']
                        );?>
                    </th>
                </tr>
            <?php endforeach;?>
        </tbody>
　　</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>

</div>


<!-- <script>
    const btn = document.querySelector("#btn");
    btn.onclick = checked; 

    function unChecked() {
        let boxes = document.querySelectorAll('input[type="checkbox"]');
        for (let i = 0; i < boxes.length; i++) {
            boxes[i].checked = false;
            this.onclick = checked;
        }
    }

    function checked() {
        let boxes = document.querySelectorAll('input[type="checkbox"]');
        for (let i = 0; i < boxes.length; i++) {
            boxes[i].checked = true;
            this.onclick = unChecked;
        }
    }
</script> -->
