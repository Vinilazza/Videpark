// templates/Slots/edit.php
?>
<h1>Edit Slot</h1>
<?= $this->Form->create($slot) ?>
<fieldset>
    <legend><?= __('Edit Slot') ?></legend>
    <?= $this->Form->control('identifier') ?>
    <?= $this->Form->control('status') ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
<p><?= $this->Html->link('Back to List', ['action' => 'index']) ?></p>
