<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 */
$loguser = $this->request->session()->read('Auth.User');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $store->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $store->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stores form large-9 medium-8 columns content">
    <?= $this->Form->create($store) ?>
    <fieldset>
        <legend><?= __('Edit Store') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('phone');
            if($loguser['type'] == 3){
            echo $this->Form->control('user_id', ['options' => $users]);
            }
       ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
