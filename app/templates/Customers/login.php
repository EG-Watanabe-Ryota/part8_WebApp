<?= $this->Flash->render() ?><!-- ← レイアウトになければ追加 -->
<form method="post">
    <fieldset>
        <label>Username</label>
        <input type="text" name="email">
        <label>Password</label>
        <input type="password" name="password">
        <input
            type="hidden" name="_csrfToken" autocomplete="off"
            value="<?= $this->request->getAttribute('csrfToken') ?>">
        <button class="button-primary" type="submit">Submit</button>
    </fieldset>
</form>