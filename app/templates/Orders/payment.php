<h1>支払い方法を選択してください</h1>     
<?= $this->Form->create()?>
    <input type="hidden" name="_csrfToken" autocomplete="off" value="<?= $this->request->getAttribute('csrfToken') ?>">
    <input type="radio" name="payment" value="1">銀行振込
    <input type="radio" name="payment" value="2">代引き
    <input type="submit" name="submit">
<?= $this->Form->end()?>                      