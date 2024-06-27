<!-- templates/Movimentos/index.php -->
<h1>Movimentos</h1>
<?= $this->Html->link('Registrar Entrada', ['action' => 'add']) ?>
<table>
    <thead>
        <tr>
            <th>Veículo</th>
            <th>Entrada</th>
            <th>Saída</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($movimentos as $movimento): ?>
        <tr>
            <td><?= h($movimento->veiculo->placa) ?></td>
            <td><?= h($movimento->entrada) ?></td>
            <td><?= h($movimento->saida) ?></td>
            <td><?= h($movimento->valor) ?></td>
            <td>
                <?= $this->Html->link('Ver', ['action' => 'view', $movimento->id]) ?>
                <?= $this->Html->link('Editar', ['action' => 'edit', $movimento->id]) ?>
                <?= $this->Form->postLink(
                    'Deletar',
                    ['action' => 'delete', $movimento->id],
                    ['confirm' => 'Tem certeza que deseja deletar?']
                ) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
