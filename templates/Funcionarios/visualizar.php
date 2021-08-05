<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Menu') ?></h4>
            <?= $this->Html->link(__('Editar Funcionário'), ['action' => 'editar', $funcionario->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar Funcionários'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Vendas'), ['controller' => 'vendas', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="funcionarios view content">
            <table>
                <tr>
                    <th><?= __('Funcionário Id') ?></th>
                    <td><?= $this->Number->format($funcionario->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($funcionario->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($funcionario->email) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Relatório de Vendas') ?></h4>
                <?php if (!empty($funcionario->vendas)) { ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id Venda') ?></th>
                            <th><?= __('Data Venda') ?></th>
                            <th><?= __('Valor') ?></th>
                            <th><?= __('Comissão') ?></th>
                        </tr>
                        <?php foreach ($funcionario->vendas as $vendas) : ?>
                        <tr>
                            <td><?= h($vendas->id) ?></td>
                            <td><?= h($vendas->data_venda) ?></td>
                            <td><?= h(number_format(($vendas->valor), 2, ',', '.')) ?></td>
                            <td><?= h(number_format(($vendas->valor * 8.5 / 100), 2, ',', '.')) ?></td>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
