<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Menu') ?></h4>
            <?= $this->Html->link(__('Listar Vendas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Funcionários'), ['controller' => 'funcionarios','action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="vendas form content">
            <?= $this->Form->create($venda) ?>
            <fieldset>
                <legend><?= __('Editar Venda') ?></legend>
                <?php
                    echo $this->Form->control('funcionario_id', ['options' => $funcionarios]);
                    echo $this->Form->control('valor');
                    echo $this->Form->control('data_venda');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Cadastrar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
