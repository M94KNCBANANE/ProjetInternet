<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Store'), ['action' => 'edit', $store->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Store'), ['action' => 'delete', $store->id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customer Orders'), ['controller' => 'CustomerOrders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer Order'), ['controller' => 'CustomerOrders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stores view large-9 medium-8 columns content">
    <h3><?= h($store->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($store->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($store->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($store->email) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Customer Orders') ?></h4>
        <?php if (!empty($store->customer_orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Store Id') ?></th>
                <th scope="col"><?= __('Delivery Date') ?></th>
                <th scope="col"><?= __('Other Details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($store->customer_orders as $customerOrders): ?>
            <tr>
                <td><?= h($customerOrders->id) ?></td>
                <td><?= h($customerOrders->customer_id) ?></td>
                <td><?= h($customerOrders->store_id) ?></td>
                <td><?= h($customerOrders->delivery_date) ?></td>
                <td><?= h($customerOrders->other_details) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CustomerOrders', 'action' => 'view', $customerOrders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CustomerOrders', 'action' => 'edit', $customerOrders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CustomerOrders', 'action' => 'delete', $customerOrders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerOrders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
