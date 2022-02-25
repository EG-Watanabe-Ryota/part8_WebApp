
<!-- <div class="table-responsive"> -->
<h1>商品ページ</h1>
　　<table class="table table-hover">
    　　  <thead>
            <tr class="table-primary">
                
                <!-- <th><button id="btn">全選択/全解除</button>選択box</th> -->
                <?= $this->Form->create(); ?>
                <th>商品番号</th>
                <th>商品画像</th>
                <th>商品名</th>
                <th>価格(円税込)</th>
                <th>カテゴリ</th>
                <th>在庫(個)</th>
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

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

