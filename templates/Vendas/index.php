<div class="vendas index content">
    <?= $this->Html->link(__('Enviar Relatório'), ['controller' => 'vendas','action' => 'enviarrelatorio'], ['class' => 'button float-right']) ?> 
    <?= $this->Html->link(__('Funcionários'), ['controller' => 'funcionarios','action' => 'index'], ['class' => 'button float-right']) ?>
    <?= $this->Html->link(__('Nova Venda'), ['action' => 'adicionar'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('funcionario_id') ?></th>
                    <th><?= $this->Paginator->sort('valor') ?></th>
                    <th><?= $this->Paginator->sort('data_venda') ?></th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendas as $venda): ?>
                <tr>
                    <td><?= $this->Number->format($venda->id) ?></td>
                    <td><?= $venda->has('funcionario') ? $this->Html->link($venda->funcionario->nome, ['controller' => 'Funcionarios', 'action' => 'visualizar', $venda->funcionario->id]) : '' ?></td>
                    <td><?= number_format(($venda->valor), 2, ',', '.') ?></td>
                    <td><?= h($venda->data_venda) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Visualizar'), ['action' => 'visualizar', $venda->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'editar', $venda->id]) ?>
                        <?= $this->Form->postLink(__('Excluir'), ['action' => 'excluir', $venda->id], ['confirm' => __('Confirmar exclusão # {0}?', $venda->id)]) ?>
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
