<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario[]|\Cake\Collection\CollectionInterface $funcionarios
 */
?>
<div class="funcionarios index content">
    <?= $this->Html->link(__('Enviar Relatório'), ['controller' => 'vendas','action' => 'enviarrelatorio'], ['class' => 'button float-right']) ?> 
    <?= $this->Html->link(__('Cadastrar Funcionário'), ['action' => 'adicionar'], ['class' => 'button float-right']) ?> 
    <?= $this->Html->link(__('Vendas'), ['controller' => 'vendas','action' => 'index'], ['class' => 'button float-right']) ?> 
    <h3><?= __('Funcionarios') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($funcionarios as $funcionario): ?>
                <tr>
                    <td><?= $this->Number->format($funcionario->id) ?></td>
                    <td><?= h($funcionario->nome) ?></td>
                    <td><?= h($funcionario->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Vendas'), ['action' => 'visualizar', $funcionario->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'editar', $funcionario->id]) ?>
                        <?= $this->Form->postLink(__('Excluir'), ['action' => 'excluir', $funcionario->id], ['confirm' => __('Confirmar exclusão # {0}?', $funcionario->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próxima') . ' >') ?>
            <?= $this->Paginator->last(__('Última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')) ?></p>
    </div>
</div>
