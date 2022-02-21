<?= $this->Form->create(null, [
                'url' => [
                    'controller' => 'Orders',
                    'action' => 'find'
                ]
            ]); ?>
            <fieldset>
                <?= $this->Form->select('condition', $condition,['default' => '検索条件を入力'])?>
                <?= $this->Form->input('find'); ?>
                <?= $this->Form->button('検索') ?>
                <?= $this->Form->end() ?>
            </fieldset>
            <?= $this->Form->end()?>


<div class="table-responsive">
　　<table class="table table-condensed">
    　　  <thead>
            <tr>
                
                <th><button id="btn">全選択/全解除</button>選択box</th>
                <?= $this->Form->create(); ?>
                <th>受注番号</th>
                <th>注文日時</th>
                <th>顧客名</th>
                <th>お届け先</th>
                <th>出荷ステータス先</th>
                <th>詳細ボタン<th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($orders as $order):?>
                <tr>
                    <th><?= $this->Form->checkbox('chk[]',['value' => h($order->id),'class' => "checks"]) ?></th>
                    <th><?= h($order->id) ?></th>
                    <td><?= h($order->created_at) ?></td>
                    <td><?= h($order->name) ?></td>
                    <td><?= h($order->address) ?></td>
                    <th><?=h($order->status)?></th>
                    <th><?=$this->Html->link(
                        '注文詳細',
                        ['controller' => 'orders', 'action' => 'order_details', $order->id],
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

<?= $this->Form->select('status', $status, ['default' => '変更するステータスを選択してください'])?>
<?= $this->Form->submit('変更を保存'); ?>
<?= $this->Form->end(); ?>
</div>

<script>
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
</script>
