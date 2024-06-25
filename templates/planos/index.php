<!-- templates/Planos/index.php -->
<h1>Planos</h1>
<?= $this->Html->link('Adicionar Plano', ['action' => 'add']) ?>
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($planos as $plano): ?>
        <tr>
            <td><?= h($plano->nome) ?></td>
            <td><?= h($plano->tipo) ?></td>
            <td><?= h($plano->preco) ?></td>
            <td>
                <?= $this->Html->link('Ver', ['action' => 'view', $plano->id]) ?>
                <?= $this->Html->link('Editar', ['action' => 'edit', $plano->id]) ?>
                <?= $this->Form->postLink(
                    'Deletar',
                    ['action' => 'delete', $plano->id],
                    ['confirm' => 'Tem certeza que deseja deletar?']
                ) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- templates/Planos/add.php -->
<h1>Adicionar Plano</h1>
<?= $this->Form->create($plano) ?>
<fieldset>
    <legend><?= __('Adicionar Plano') ?></legend>
    <?= $this->Form->control('nome') ?>
    <?= $this->Form->control('tipo', ['options' => ['pre-pago' => 'Pré-pago', 'pos-pago' => 'Pós-pago']]) ?>
    <?= $this->Form->control('preco') ?>
</fieldset>
<?= $this->Form->button(__('Salvar')) ?>
<?= $this->Form->end() ?>

<!-- templates/Planos/edit.php -->
<h1>Editar Plano</h1>
<?= $this->Form->create($plano) ?>
<fieldset>
    <legend><?= __('Editar Plano') ?></legend>
    <?= $this->Form->control('nome') ?>
    <?= $this->Form->control('tipo', ['options' => ['pre-pago' => 'Pré-pago', 'pos-pago' => 'Pós-pago']]) ?>
    <?= $this->Form->control('preco') ?>
</fieldset>
<?= $this->Form->button(__('Salvar')) ?>
<?= $this->Form->end() ?>
