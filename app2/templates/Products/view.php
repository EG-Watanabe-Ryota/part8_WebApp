<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Carts'), ['controller' => 'Carts', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Cart'), ['controller' => 'Carts', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Order Datails'), ['controller' => 'OrderDatails', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Order Datail'), ['controller' => 'OrderDatails', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Img') ?></th>
                <td><?= h($product->img) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($product->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Category') ?></th>
                <td><?= h($product->category) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Code') ?></th>
                <td><?= h($product->code) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($product->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Stock') ?></th>
                <td><?= $this->Number->format($product->stock) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Price') ?></th>
                <td><?= $this->Number->format($product->price) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date') ?></th>
                <td><?= h($product->date) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Carts') ?></h4>
        <?php if (!empty($product->carts)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Product Id') ?></th>
                    <th scope="col"><?= __('Customer Id') ?></th>
                    <th scope="col"><?= __('Quantity') ?></th>
                    <th scope="col"><?= __('Created At') ?></th>
                    <th scope="col"><?= __('Updated At') ?></th>
                    <th scope="col"><?= __('Isdelete') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($product->carts as $carts): ?>
                <tr>
                    <td><?= h($carts->id) ?></td>
                    <td><?= h($carts->product_id) ?></td>
                    <td><?= h($carts->customer_id) ?></td>
                    <td><?= h($carts->quantity) ?></td>
                    <td><?= h($carts->created_at) ?></td>
                    <td><?= h($carts->updated_at) ?></td>
                    <td><?= h($carts->isdelete) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Carts', 'action' => 'view', $carts->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Carts', 'action' => 'edit', $carts->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'Carts', 'action' => 'delete', $carts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carts->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Order Datails') ?></h4>
        <?php if (!empty($product->order_datails)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Datail Id') ?></th>
                    <th scope="col"><?= __('Product Id') ?></th>
                    <th scope="col"><?= __('Datail Total Price') ?></th>
                    <th scope="col"><?= __('Order Id') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($product->order_datails as $orderDatails): ?>
                <tr>
                    <td><?= h($orderDatails->datail_id) ?></td>
                    <td><?= h($orderDatails->product_id) ?></td>
                    <td><?= h($orderDatails->datail_total_price) ?></td>
                    <td><?= h($orderDatails->order_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'OrderDatails', 'action' => 'view', $orderDatails->datail_id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'OrderDatails', 'action' => 'edit', $orderDatails->datail_id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'OrderDatails', 'action' => 'delete', $orderDatails->datail_id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderDatails->datail_id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
