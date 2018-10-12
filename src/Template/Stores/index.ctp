<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store[]|\Cake\Collection\CollectionInterface $stores
 */
$loguser =  $this->request->session()->read('Auth.User');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if($loguser['type'] == 3){ ?>
        <li><?= $this->Html->link(__('New Store Representative'), ['controller' => 'Users', 'action' => 'addStore']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        
        <?php } 
        if($loguser['type']%3 == 1) {?>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <?php } 
        if($loguser['type'] == 1){ ?>
        <li><?= $this->Html->link(__('List Order'), ['controller' => 'OrderItems', 'action' => 'index']) ?> </li>
        <?php }?>
    </ul>
</nav>
<div class="stores index large-9 medium-8 columns content">
    <h3><?= __('Stores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stores as $store): ?>
            <tr>
                <td><?= h($store->name) ?></td>
                <td><?= h($store->phone) ?></td>
                <td><?= h($store->created) ?></td>
                <td><?= $store->has('user') ? $this->Html->link($store->user->email, ['controller' => 'Users', 'action' => 'view', $store->user->id]) : '' ?></td>
                <td class="actions">
                
                <?= $this->Html->link(__('View'), ['action' => 'view', $store->id]) ?>
                <?php if($loguser['type'] == 3) {?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $store->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $store->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $store->user->email)]) ?>
                 <?php } ?>
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
