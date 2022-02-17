<div class="table-responsive">
　　<table class="table table-condensed">
        <thead>
            <tr>
                <th>商品画像</th>
                <th>商品名</th>
                <th>出荷ステータス先</th>
                <th>支払い方法<th>
                <th>単価(税込)</th>
                <th>数量</th>
                <th>小計</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $val):?>
                <tr>
                    <td><img src=<?='/var/www/app/webroot/img/'. $val['img'] ?>></td>
                    <td><?= h($val['name']) ?></td>
                    <td><?='入荷済み' ?></td>
                    <td><?='daibiki' ?></td>
                    <th><?=h($val['price']) ?></th>
                    <th><?=h($val['quantity'])?></th>
                    <th><?=h($val['sub_total'])?></th>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>