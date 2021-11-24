<div class="customers-form">
<?= $this->Form->create($customer) ?>
    <fieldset>
        <legend><?= __('新規登録') ?></legend>
        <?= $this->Form->control('name') ?>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>