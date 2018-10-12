<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderItem $orderItem
 * @var \App\Model\Entity\Product $product
 * @var \App\Model\Entity\Customer $customer
 */
$loguser =  $this->request->getSession()->read('Auth.User');
//$customer = $this->request->

?>
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Order Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderItems form large-9 medium-8 columns content">
    <?= $this->Form->create($orderItem) ?>
    <fieldset>
        <legend><?= __('Add Order Item') ?></legend>
        <?php
        if($loguser['type'] == 1){
            echo $this->Form->hidden('customer_id', ['value' => $customers['id']]);
        }else{
            echo $this->Form->control('customer_id', ['options' => $customers]);
        }
            echo $this->Form->control('product_id', ['options' => $nouveau, 'default' => $productid]);
            echo $this->Form->control('quantity');
            echo $this->Form->hidden('price');
            echo $this->Form->control('date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
