<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductType $productType
 */
$loguser = $this->request->session()->read('Auth.User');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Product Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>       
        <?php if($loguser['type']%3 == 2 ): ?>
        <li><?= $this->Html->link(__('New Product Type'), ['action' => 'add']) ?> </li>
       <?php endif; 
       if($loguser['type'] === 2 ):?>
        <li><?= $this->Html->link(__('Edit Product Type'), ['action' => 'edit', $productType->id]) ?> </li>
    <?php endif;
    if($loguser['type'] === 3 ):?>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?> </li>       
        <li><?= $this->Html->link(__('New Product Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Edit Product Type'), ['action' => 'edit', $productType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Type'), ['action' => 'delete', $productType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productType->id)]) ?> </li>

    <?php endif; ?>    
    </ul>
</nav>
<div class="productTypes view large-9 medium-8 columns content">
    <h3><?= h($productType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($productType->name) ?></td>
        </tr>
    </table>
   <!-- <div class="related">
        <h4><?= __('Related Items') ?></h4>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('name') ?></th>
                <th scope="col"><?= __('price') ?></th>
                <th scope="col"><?= __('productType_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>

            <?php foreach ($products as $item): ?>
            <tr>
                <?php if($item['store_id'] == $product['store_id'] && $item['id'] != $product['id'] && $item->deleted == null){ ?>
                <td><?= h($item->name) ?></td>
                <td><?= $this->Number->currency($item->price, "USD") ?>$</td>
                
                <td><?= $item->has('product_type') ? $this->Html->link($item->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $item->product_type->id]) : '' ?></td>
                <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                   </td>
                <?php } ?>
            </tr>
            <?php endforeach; ?>
        </table>
    </div> -->
</div>
