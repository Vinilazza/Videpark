<!-- templates/Movimentos/relatorio_financeiro.php -->
<h1>Relatório Financeiro</h1>
<table>
    <thead>
        <tr>
            <th>Veículo</th>
            <th>Vaga</th>
            <th>Entrada</th>
            <th>Saída</th>
            <th>Preço</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($movimentos as $movimento): ?>
        <tr>
            <td><?= h($movimento->veiculo->placa) ?></td>
            <td><?= h($movimento->vaga->numero) ?></td>
            <td><?= h($movimento->entrada) ?></td>
            <td><?= h($movimento->saida) ?></td>
            <td>
                <?php 
                $diferenca = $movimento->saida->diffInHours($movimento->entrada);
                $preco = $diferenca * $movimento->veiculo->plano->preco;
                echo h($preco);
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h2>Total Receita: <?= h($totalReceita) ?></h2>
