<div class="users-form">
    <?= $this->Form->create($customer) ?>
        <fieldset>
            <legend><?= __('新規登録') ?></legend>
            <?= $this->Form->control('email') ?>
            <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')); ?>
    <?= $this->Form->end() ?>
    <p>すでに会員の方は<?= $this->Html->link('こちら', ['action' => 'login']) ?>からログイン</p>
</div>