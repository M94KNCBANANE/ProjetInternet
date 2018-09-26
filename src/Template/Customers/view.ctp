<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customer Orders'), ['controller' => 'CustomerOrders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer Order'), ['controller' => 'CustomerOrders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($customer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($customer->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($customer->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id User') ?></th>
            <td><?= $this->Number->format($customer->id_user) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Customer Orders') ?></h4>
        <?php if (!empty($customer->customer_orders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col"><?= __('Store Id') ?></th>
                <th scope="col"><?= __('Delivery Date') ?></th>
                <th scope="col"><?= __('Other Details') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->customer_orders as $customerOrders): ?>
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
