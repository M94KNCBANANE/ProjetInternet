<?php $loguser = $this->request->session()->read('Auth.User') ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <?php if ($loguser['type'] >= 2) : ?>
            <li> <?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?> </li>
            <li> <?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>			
            <li> <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
            <li> <?= $this->Html->link(__('New Store'), ['controller' => 'Users', 'action' => 'addStore']) ?></li>
            <li> <?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add', $loguser['id']]) ?></li>
        <?php endif ?>
        <?php if ($loguser == null) : ?>
            <li> <?= $this->Html->link(__('New Customer Account'), ['controller' => 'users', 'action' => 'addCustomer']) ?></li>
        <?php endif ?>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3>Bienvenue sur ce merveilleux site!</h3>
</div>