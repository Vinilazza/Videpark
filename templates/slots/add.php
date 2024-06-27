// templates/Slots/add.php
?>
<h1>Add Slot</h1>
<?= $this->Form->create($slot) ?>
<fieldset>
    <legend><?= __('Add Slot') ?></legend>
    <?= $this->Form->control('identifier') ?>
    <?= $this->Form->control('status') ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
<p><?= $this->Html->link('Back to List', ['action' => 'index']) ?></p>
