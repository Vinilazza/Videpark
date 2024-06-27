<!-- templates/Movimentos/add.php -->
<h1>Registrar Entrada</h1>
<?= $this->Form->create($movimento) ?>
<fieldset>
    <legend><?= __('Registrar Entrada') ?></legend>
    <?= $this->Form->control('veiculo_id', ['options' => $veiculos]) ?>
    <?= $this->Form->control('entrada', ['type' => 'datetime']) ?>
</fieldset>
<?= $this->Form->button(__('Salvar')) ?>
<?= $this->Form->end() ?>
