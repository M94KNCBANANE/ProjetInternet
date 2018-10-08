<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>
<?= $this->Html->link(__('New Customer Account'), ['controller' => 'users', 'action' => 'addCustomer']) ?></li>
       