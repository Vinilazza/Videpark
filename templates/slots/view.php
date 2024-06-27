// templates/Slots/view.php
?>
<h1>View Slot</h1>
<p><strong>Identifier:</strong> <?= h($slot->identifier) ?></p>
<p><strong>Status:</strong> <?= h($slot->status) ?></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $slot->id]) ?></p>
<p><?= $this->Html->link('Back to List', ['action' => 'index']) ?></p>
