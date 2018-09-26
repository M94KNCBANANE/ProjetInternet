<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomerOrder[]|\Cake\Collection\CollectionInterface $customerOrders
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customer Order'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customerOrders index large-9 medium-8 columns content">
    <h3><?= __('Customer Orders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delivery_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customerOrders as $customerOrder): ?>
            <tr>
                <td><?= $this->Number->format($customerOrder->id) ?></td>
                <td><?= $customerOrder->has('customer') ? $this->Html->link($customerOrder->customer->name, ['controller' => 'Customers', 'action' => 'view', $customerOrder->customer->id]) : '' ?></td>
                <td><?= $customerOrder->has('store') ? $this->Html->link($customerOrder->store->name, ['controller' => 'Stores', 'action' => 'view', $customerOrder->store->id]) : '' ?></td>
                <td><?= h($customerOrder->delivery_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customerOrder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customerOrder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customerOrder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customerOrder->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
