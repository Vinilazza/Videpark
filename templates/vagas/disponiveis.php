<!-- templates/Vagas/disponiveis.php -->
<h1>Vagas Disponíveis</h1>
<table>
    <thead>
        <tr>
            <th>Número</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vagasDisponiveis as $vaga): ?>
        <tr>
            <td><?= h($vaga->numero) ?></td>
            <td><?= $this->Html->link('Detalhes', ['action' => 'view', $vaga->id]) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
