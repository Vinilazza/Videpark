<!-- templates/Vagas/index.php -->
<h1>Vagas</h1>
<?= $this->Html->link('Adicionar Vaga', ['action' => 'add']) ?>
<table>
    <thead>
        <tr>
            <th>Número</th>
            <th>Disponível</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vagas as $vaga): ?>
        <tr>
            <td><?= h($vaga->numero) ?></td>
            <td><?= $vaga->disponivel ? 'Sim' : 'Não' ?></td>
            <td>
                <?= $this->Html->link('Ver', ['action' => 'view', $vaga->id]) ?>
                <?= $this->Html->link('Editar', ['action' => 'edit', $vaga->id]) ?>
                <?= $this->Form->postLink(
                    'Deletar',
                    ['action' => 'delete', $vaga->id],
                    ['confirm' => 'Tem certeza que deseja deletar?']
                ) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- templates/Vagas/add.php -->
<h1>Adicionar Vaga</h1>
<?= $this->Form->create($vaga) ?>
<fieldset>
    <legend><?= __('Adicionar Vaga') ?></legend>
    <?= $this->Form->control('numero') ?>
</fieldset>
<?= $this->Form->button(__('Salvar')) ?>
<?= $this->Form->end() ?>

<!-- templates/Vagas/edit.php -->
<h1>Editar Vaga</h1>
<?= $this->Form->create($vaga) ?>
<fieldset>
    <legend><?= __('Editar Vaga') ?></legend>
    <?= $this->Form->control('numero') ?>
    <?= $this->Form->control('disponivel') ?>
</fieldset>
<?= $this->Form->button(__('Salvar')) ?>
<?= $this->Form->end() ?>
