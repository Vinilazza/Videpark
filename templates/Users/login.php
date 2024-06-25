<h1>Login</h1>
<?= $this->Form->create() ?>
<fieldset>
    <legend><?= __('Por favor, entre com seu usuário e senha') ?></legend>
    <?= $this->Form->control('username') ?>
    <?= $this->Form->control('password') ?>
</fieldset>
<?= $this->Form->button(__('Login')) ?>
<?= $this->Form->end() ?>