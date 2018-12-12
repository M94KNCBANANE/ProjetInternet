<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
echo $this->Html->css(["https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css",
"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css",
"ProductTypes/basic.css"]);
echo $this->Html->script([
            "https://code.jquery.com/jquery-3.3.1.slim.min.js",
            "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js",
            "https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js",
            "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js",
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js',
            'https://code.jquery.com/jquery-1.12.4.js',
            'https://code.jquery.com/ui/1.12.1/jquery-ui.js'
                ], ['block' => 'scriptLibraries']);

$urlToRestApi = $this->Url->build('/api/users',true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('login', ['block' => 'scriptBottom']);
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>

    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><?= $this->Html->link(__('Main menu'), ['controller' => 'Products', 'action' => 'index']) ?></h1>
            </li>
			
        </ul>
        <div class="left">
        <div class="dropright">
    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownLoginButton" data-toggle="dropdown">
    Login
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownLoginButton">
  
			<table>
				<tr > 
					<td >Email:</td>
					<td ><input type="email" id="username" ng-model="users.email" /></td>
				</tr>
				<tr>
					<td >Password:</td>
					<td ><input type="password" id="password" ng-model="users.password" /></td>
				</tr>
			</table>

			<a ng-click="login()" class="dropdown-item">Login</a> 

    </div>
    </div>
    </div>
   
        <?php 
        $loguser = $this->request->getSession()->read('Auth.User');
        if($loguser){
            $user = $loguser['email'];
            $type = $loguser['type'];
            $emailaddress = $loguser['email'];
            $uuidparam = $loguser['uuid'];
             if ($type > 3){
                echo $this->Html->link('Please validate your account. Click to resend confirmation email.', ['controller' => 'emails', 'action' => 'index', '?'=>['email'=>$emailaddress, 'uuid'=>$uuidparam]]);                
            }
            ?>  
             <div class="right">
        <div class="dropleft">
  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Menu Item
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  
            
                <?php
echo $this->Html->link($user, ['controller' => 'Users', 'action' => 'view', $loguser['id']], array('class' => 'dropdown-item'));

                echo $this->Html->link(__('A propos'), ['controller' => 'Users',  'action' => 'apropos'], array('class' => 'dropdown-item'));
			
               
               
                if($type == 3){
                   echo $this->Html->link('Section Admin', [
                        'prefix' => 'admin',
                        'controller' => 'Products',
                        'action' => 'index'
                    ], array('class' => 'dropdown-item'));
                }
             
                echo $this->Html->link(__('logout'), ['controller' => 'Users', 'action' => 'logout'], array('class' => 'dropdown-item'));
			} else {
                ?>
                <div class="right">
                     <div class="dropleft">
  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Menu Item
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<?php
				echo $this->Html->link(__('login'), ['controller' => 'Users', 'action' => 'login'], array('class' => 'dropdown-item'));
			
			}
			
             ?>
             <div class="dropdown-divider"></div>
             <?php 

            echo $this->Html->link('Français', [ 'action' => 'changeLang', 'fr_CA'], array('class' => 'dropdown-item'));
            echo $this->Html->link('English', ['action' => 'changeLang', 'en_US'],  array('class' => 'dropdown-item')); 
    		echo $this->Html->link('Japanese', ['action' => 'changeLang', 'ja_JP'], array('class' => 'dropdown-item')); ?>
					
            </div>
        </div>
    </div>
            
            
        
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
    <?= $this->fetch('scriptLibraries') ?>
        <?= $this->fetch('script'); ?>
        <?= $this->fetch('scriptBottom') ?>   
    </body>
</html>
