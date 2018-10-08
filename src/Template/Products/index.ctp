<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
$loguser = $this->request->session()->read('Auth.User');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php 
        if($loguser['type'] == 1){
        ?>
        <li><?= $this->Html->link(__('Order a Product'), ['controller' => 'OrderItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List of Order'), ['controller' => 'OrderItems', 'action' => 'index']) ?></li>
        <?php 
        }
        if($loguser['type'] == 3){
        ?>
        <li><?= $this->Html->link(__('List of Order'), ['controller' => 'OrderItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
        <?php } ?>
    </ul>
</nav>
<div class="products index large-9 medium-8 columns content">
    <h3><?= __('Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('productType_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_id') ?></th>
                <?php if($loguser['type'] == 3) {?>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <?php } ?> 
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
            <?php if($product->deleted == null || $loguser['type'] == 3){ ?>
                <td><?= h($product->name) ?></td>
                <td><?= $this->Number->format($product->price) ?>$</td>
                <td><?= h($product->image) ?></td>
                <td><?= $product->has('product_type') ? $this->Html->link($product->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $product->product_type->id]) : '' ?></td>
                <td><?= $product->has('store') ? $this->Html->link($product->store->name, ['controller' => 'Stores', 'action' => 'view', $product->store->id]) : '' ?></td>
                <?php if($loguser['type'] == 3) {
                    $deleted = ($product->deleted != null ? 'Yes' : 'No');
                    echo "<td> $deleted </td>";
                
                     }?>    
                <td class="actions">
    
                   <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                    <?php 
                    if($loguser['type'] == 1){
                    ?>
                    <?= $this->Html->link(__('Order'), ['controller' => 'OrderItems', 'action' => 'add', $product->id ]) ?>
                    <?php }
                    if($loguser['type'] == 3) {?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                    <?php }?>
                </td>
                <?php }?>
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
