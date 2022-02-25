<h1>支払い方法を選択してください</h1>     
<?= $this->Form->create(null,['url' => ['controller' => 'orders','action' => 'confirm']]); ?>
    <input type="hidden" name="_csrfToken" autocomplete="off" value="<?= $this->request->getAttribute('csrfToken') ?>">
    <?php foreach($payment_methods as $key => $valu):?>
        <input type="radio" name="payment" value=<?=h($payment_methods[$key]['id'])?>><?=h($payment_methods[$key]['name'])?>
    <?php endforeach;?>
    <input type="submit" name="submit">
<?= $this->Form->end()?>