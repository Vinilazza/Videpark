<!-- templates/Veiculos/add.php -->
<h1>Adicionar Veículo</h1>
<?= $this->Form->create($veiculo) ?>
<fieldset>
    <legend><?= __('Adicionar Veículo') ?></legend>
    <?= $this->Form->control('placa') ?>
    <?= $this->Form->control('modelo') ?>
    <?= $this->Form->control('cor') ?>
    <?= $this->Form->control('tipo') ?>
</fieldset>
<?= $this->Form->button(__('Salvar')) ?>
<?= $this->Form->end() ?>
