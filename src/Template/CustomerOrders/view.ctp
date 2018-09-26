<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomerOrder $customerOrder
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer Order'), ['action' => 'edit', $customerOrder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer Order'), ['action' => 'delete', $customerOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerOrder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customer Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customerOrders view large-9 medium-8 columns content">
    <h3><?= h($customerOrder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $customerOrder->has('customer') ? $this->Html->link($customerOrder->customer->name, ['controller' => 'Customers', 'action' => 'view', $customerOrder->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Store') ?></th>
            <td><?= $customerOrder->has('store') ? $this->Html->link($customerOrder->store->name, ['controller' => 'Stores', 'action' => 'view', $customerOrder->store->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customerOrder->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delivery Date') ?></th>
            <td><?= h($customerOrder->delivery_date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Other Details') ?></h4>
        <?= $this->Text->autoParagraph(h($customerOrder->other_details)); ?>
    </div>
</div>
