<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$loguser =  $this->request->session()->read('Auth.User');
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php if($loguser['type'] == 3){ ?>
        
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'addCustomer']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['action' => 'addStore']) ?> </li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?> </li>
        <?php }else{ ?>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'editCustomer', $loguser['id']]) ?> </li>
        <?php }?>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3>Account Information</h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        </tr>
        <tr>
		<?php 
		switch($user->type){
			case 1: $type='Customer';
			break;
			case 2: $type='Representative';
			break;
			case 3: $type= 'Admin';
            break;
			default: $type= 'Not defined';
			break;
		}?>
			<th scope="row"><?= __('Type') ?></th>
            <td><?= h($type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <?php if (!empty($user->customers)): ?>
        <?php foreach ($user->customers as $customers): ?>    
        <tr>
        <th scope="col"><?= __('Name') ?></th>
        <td><?= h($customers->name) ?></td>
        </tr>   
        <tr>
        <th scope="col"><?= __('Phone') ?></th>
        <td><?= h($customers->phone) ?></td>
        </tr>   
        <?php endforeach; ?>
        <?php endif; ?>    
        
        <?php if (!empty($user->stores)): ?>
        <?php foreach ($user->stores as $stores): ?>
        <tr>
        <th scope="col"><h3><?= $this->Html->link($stores->name, ['controller' => 'Stores', 'action' => 'view', $stores->id]) ?></h3></th>
        </tr>   
        <tr>
        <th scope="col"><?= __('Phone') ?></th>
        <td><?= h($stores->phone) ?></td>
        </tr>   
        <?php endforeach; ?>
        <?php endif; ?>    
        </table>
</div>
