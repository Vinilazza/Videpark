// templates/Slots/index.php
?>
<h1>Slots</h1>
<?= $this->Html->link('Add Slot', ['action' => 'add']) ?>
<table>
    <tr>
        <th>ID</th>
        <th>Identifier</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($slots as $slot): ?>
    <tr>
        <td><?= $slot->id ?></td>
        <td><?= h($slot->identifier) ?></td>
        <td><?= h($slot->status) ?></td>
        <td>
            <?= $this->Html->link('View', ['action' => 'view', $slot->id]) ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $slot->id]) ?>
            <?= $this->Form->postLink('Delete', ['action' => 'delete', $slot->id], ['confirm' => 'Are you sure?']) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
