<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderItem $orderItem
 */
$loguser = $this->request->session()->read('Auth.User');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
            <?php if($loguser['type'] == 1): ?>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
     <li><?= $this->Html->link(__('List Order Items'), ['controller' => 'OrderItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Item'), ['controller' => 'OrderItems', 'action' => 'add']) ?></li>
    
    <?php endif; ?>
    <?php if($loguser['type'] == 3): ?>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orderItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orderItem->id)]
            )
        ?>   
        <li><?= $this->Html->link(__('List Order Items'), [ 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Item'), [ 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>

    
    <?php endif; ?></ul>
</nav>
<div class="orderItems form large-9 medium-8 columns content">
    <?= $this->Form->create($orderItem) ?>
    <fieldset>
        <legend><?= __('Edit Order Item') ?></legend>
        <?php
        if($loguser['type'] == 1){
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('date');
        }else{
            echo $this->Form->control('customer_id', ['options' => $customers]);
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('price');
            echo $this->Form->control('date');
        }

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
