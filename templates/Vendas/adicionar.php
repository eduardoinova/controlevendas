<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venda $venda
 * @var \Cake\Collection\CollectionInterface|string[] $funcionarios
 */
?>
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
                <legend><?= __('Nova Venda') ?></legend>
                <select name="funcionario_id" id="funcionario_id">
                    <option value="">Selecione</option>
                    <?php
                        foreach ($funcionarios as $key => $value) {
                    ?>
                    <option value="<?php echo $value['id']; ?>"><?php echo $value['nome']; ?></option>
                    <?php   } ?>
                </select>
                <?php 
                    echo $this->Form->control('valor');
                    echo $this->Form->control('data_venda');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Cadastrar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
