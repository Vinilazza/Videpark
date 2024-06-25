<!-- templates/Movimentos/edit.php -->
<h1>Editar Movimento</h1>
<?= $this->Form->create($movimento) ?>
<fieldset>
    <legend><?= __('Editar Movimento') ?></legend>
    <?= $this->Form->control('veiculo_id', ['options' => $veiculos]) ?>
    <?= $this->Form->control('entrada', ['type' => 'datetime']) ?>
    <?= $this->Form->control('saida', ['type' => 'datetime']) ?>
    <?= $this->Form->control('valor') ?>
</fieldset>
<?= $this->Form->button(__('Salvar')) ?>
<?= $this->Form->end() ?>
