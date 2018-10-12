<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderItem[]|\Cake\Collection\CollectionInterface $orderItems
 */

$loguser = $this->request->session()->read('Auth.User');
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if($loguser['type'] == 1): ?>
        <li><?= $this->Html->link(__('New Order Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
     <?php endif; ?>

    <?php if($loguser['type'] == 3): ?>
        <li><?= $this->Html->link(__('New Order Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    <?php endif; ?>

    </ul>
</nav>
<div class="orderItems index large-9 medium-8 columns content">
    <h3><?= __('Order Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
            <?php if($loguser['type'] == 3):  ?>
                <th scope="col"><?= $this->Paginator->sort('customer_id') ?></th>
            <?php endif; ?>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderItems as $orderItem): ?>
            <tr>
            <?php if($orderItem->customer['user_id']==$loguser['id'] || $loguser['type'] == 3){ ?>
                <?php if($loguser['type'] == 3){ ?>            
                <td><?= $orderItem->has('customer') ? $this->Html->link($orderItem->customer->name, ['controller' => 'Customers', 'action' => 'view', $orderItem->customer->id]) : '' ?></td>
                <?php } ?>
                <td><?= $orderItem->has('product') ? $this->Html->link($orderItem->product->name, ['controller' => 'Products', 'action' => 'view', $orderItem->product->id]) : '' ?></td>
                <td><?= $this->Number->format($orderItem->quantity) ?></td>
                <td><?= $this->Number->currency($orderItem->price, 'USD') ?></td>
                <td><?= h($orderItem->date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orderItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderItem->id]) ?>
                    <?php if($loguser['type'] == 3){ ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderItem->id)]) ?>
                    <?php } ?>
                </td>
            <?php } ?>
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
