<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Menu') ?></h4>
            <?= $this->Html->link(__('Editar Venda'), ['action' => 'editar', $venda->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Vendas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Funcionários'), ['controller'=>'funcionarios','action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendas view content">
            <table>
                <tr>
                    <th><?= __('Venda ID') ?></th>
                    <td><?= $this->Number->format($venda->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Funcionário') ?></th>
                    <td><?= $venda->has('funcionario') ? $this->Html->link($venda->funcionario->nome, ['controller' => 'Funcionarios', 'action' => 'view', $venda->funcionario->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor') ?></th>
                    <td><?= $this->Number->format($venda->valor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Venda') ?></th>
                    <td><?= h($venda->data_venda) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
