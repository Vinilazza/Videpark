<!-- templates/Veiculos/index.php -->
<h1>Veículos</h1>
<?= $this->Html->link('Adicionar Veículo', ['action' => 'add']) ?>
<table>
    <thead>
        <tr>
            <th>Placa</th>
            <th>Modelo</th>
            <th>Cor</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($veiculos as $veiculo): ?>
        <tr>
            <td><?= h($veiculo->placa) ?></td>
            <td><?= h($veiculo->modelo) ?></td>
            <td><?= h($veiculo->cor) ?></td>
            <td><?= h($veiculo->tipo) ?></td>
            <td>
                <?= $this->Html->link('Ver', ['action' => 'view', $veiculo->id]) ?>
                <?= $this->Html->link('Editar', ['action' => 'edit', $veiculo->id]) ?>
                <?= $this->Form->postLink(
                    'Deletar',
                    ['action' => 'delete', $veiculo->id],
                    ['confirm' => 'Tem certeza que deseja deletar?']
                ) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
