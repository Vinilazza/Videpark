<!-- templates/Veiculos/edit.php -->
<h1>Editar Veículo</h1>
<?= $this->Form->create($veiculo) ?>
<fieldset>
    <legend><?= __('Editar Veículo') ?></legend>
    <?= $this->Form->control('placa') ?>
    <?= $this->Form->control('modelo') ?>
    <?= $this->Form->control('cor') ?>
    <?= $this->Form->control('tipo') ?>
</fieldset>
<?= $this->Form->button(__('Salvar')) ?>
<?= $this->Form->end() ?>
