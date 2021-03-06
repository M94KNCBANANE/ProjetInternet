<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
$loguser = $this->request->session()->read('Auth.User');
$urlToRestApi = $this->Url->build('/api/product_types',true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('ProductTypes/index', ['block' => 'scriptBottom']);
echo $this->Html->script('login', ['block' => 'scriptBottom']);
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">

    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php 
        if($loguser['type']%3 == 1):
        ?>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <?php 
        endif; 
        if($loguser['type'] == 1):
        ?>
        <li><?= $this->Html->link(__('Order a Product'), ['controller' => 'OrderItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List of Order'), ['controller' => 'OrderItems', 'action' => 'index']) ?></li>
        <?php 
        endif;
        if($loguser['type']%3 == 2):  ?>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
        
        <?php endif;
        if($loguser['type'] == 3):
        ?>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List of Order'), ['controller' => 'OrderItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store Representative'), ['controller' => 'Users', 'action' => 'addStore']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <?php endif; ?>
    </ul>
</nav>
<div class="products index large-9 medium-8 columns content">

<div ng-app = "app" >

<div class="row">

    <div class="panel panel-default subscriptions-content">

        <div ng-controller = "usersCtrl">

            <div id="logDiv" style="margin: 10px 0 20px 0;"><a href="javascript:void(0);" class="glyphicon glyphicon-log-in" id="login-btn" onclick="javascript:$('#loginForm').slideToggle();">Login</a></div>

            <div class="none formData" id="loginForm">
                <form class="form" enctype='application/json'>
                    <div class="form-group">
                        <label>Username</label>
                        <input ng-model="username" type="text" class="form-control" id="username" name="username" style="width: 250px" />
                        <label>Password</label>
                        <input ng-model="password" type="password" class="form-control" id="password" name="password"  style="width: 250px"/>
                        <div id="example1"></div> 
                        <p style="color:red;">{{ captcha_status }}</p>
                        
                    </div>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#loginForm').slideUp(); emptyInput();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" ng-click="login()">Submit</a>
                </form>
            </div>

            <div class="panel-body none formData" id="changeForm">
                <form class="form" enctype='application/json'>
                    <div class="form-group">
                        <label>New password</label>
                        <input ng-model="newPassword" type="password" class="form-control" id="form-password" name="form-password" style="width: 250px" />
                    </div>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#changeForm').slideUp(); emptyInput();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" ng-click="changePassword()">Submit</a>
                    <a href="javascript:void(0);" class="btn btn-warning" ng-click="logout()">Logout</a>
                </form>
            </div>
            <br>
            <div>
                <p style="color: green;">{{messageLogin}}</p>
                <p style="color: red;">{{errorLogin}}</p>
            </div>
            <br>

        </div>

    <h3><?= __('Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('productType_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('store_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                <?php if($loguser['type'] == 3 || $loguser['type'] == 2) :?>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <?php endif;  ?> 
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
            <?php                 
                if($loguser['type']%3 == 2 && $product['store_id'] == $store['id'] || $loguser['type']%3 != 2){ 
                if($product->deleted == false || $loguser['type'] == 3 || $loguser['type'] == 2){ ?>

                <td><?= h($product->name) ?></td>
                <td><?= $this->Number->currency($product->price, "USD") ?></td>
                <td><?= $product->has('product_type') ? $this->Html->link($product->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $product->product_type->id]) : '' ?></td>
                <td><?= $product->has('store') ? $this->Html->link($product->store->name, ['controller' => 'Stores', 'action' => 'view', $product->store->id]) : '' ?></td>
                <td><?= $product->has('city') ? $this->Html->link($product->city->name, ['controller' => 'City', 'action' => 'view', $product->city->id]) : '' ?></td>
                <?php if($loguser['type'] == 3 || $loguser['type'] == 2) {
                    $deleted = ($product->deleted == true ? 'Yes' : 'No');
                    echo "<td> $deleted </td>";
                
                     }
                    ?>    
                <td class="actions">
                    <?php if($loguser['type'] >= 1):?>    
                     <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                     <?= $this->Html->link(__('pdf'), ['action' => 'view', $product->id . '.pdf']) ?>
                     
                     <?php endif; 
                     if($loguser['type'] == 1):?>
                    <?= $this->Html->link(__('Order'), ['controller' => 'OrderItems', 'action' => 'add', $product->id ]) ?>
                    <?php endif; 
                    if($loguser['type'] == 3 || $loguser['type'] == 2) :?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                    <?php if($product['deleted']) { ?>
                    <?= $this->Form->postLink(__('Restore'), ['action' => 'restore', $product->id], ['confirm' => __('Are you sure you want to restore # {0}?', $product->id)]) ?>
                    <?php }else{?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                    <?php } ?>
                    <?php endif; ?>
                </td>
                <?php } }?>
            </tr>
            <?php endforeach;?>
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
