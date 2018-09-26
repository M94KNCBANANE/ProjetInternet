<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomerOrder $customerOrder
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customerOrder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customerOrder->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Customer Orders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customerOrders form large-9 medium-8 columns content">
    <?= $this->Form->create($customerOrder) ?>
    <fieldset>
        <legend><?= __('Edit Customer Order') ?></legend>
        <?php
            echo $this->Form->control('customer_id', ['options' => $customers]);
            echo $this->Form->control('store_id', ['options' => $stores]);
            echo $this->Form->control('delivery_date');
            echo $this->Form->control('other_details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
