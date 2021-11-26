<?= $this->Flash->render() ?><!-- ← レイアウトになければ追加 -->
<form method="post">
    <fieldset>
        <label>メールアドレス</label>
        <input type="text" name="email">
        <label>パスワード</label>
        <input type="password" name="password">
        <input
            type="hidden" name="_csrfToken" autocomplete="off"
            value="<?= $this->request->getAttribute('csrfToken') ?>">
        <button class="button-primary" type="submit">Submit</button>
    </fieldset>
    <?= $this->Html->link('新規登録はこちらから', ['action' => 'add']) ?>
</form>