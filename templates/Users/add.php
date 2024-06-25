<h1>Adicionar Usuário</h1>
<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Adicionar Usuário') ?></legend>
    <?= $this->Form->control('username') ?>
    <?= $this->Form->control('password', ['type' => 'password']) ?>
</fieldset>
<?= $this->Form->button(__('Salvar')) ?>
<?= $this->Form->end() ?>