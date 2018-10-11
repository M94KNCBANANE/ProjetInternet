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
        <div class="top-bar-section">
            <ul class="right">
            <li>
                <?php
                echo $this->Html->link(__('A propos'), ['controller' => 'Users',  'action' => 'apropos']);
			?></li>
            <li><?php
			$loguser = $this->request->getSession()->read('Auth.User');
			if($loguser){
                $user = $loguser['email'];
                $type = $loguser['type'];
                $emailaddress = $loguser['email'];
                $uuidparam = $loguser['uuid'];
                 if ($type > 3){
                    echo $this->Html->link('Please validate your account. Click to resend confirmation email.', ['controller' => 'emails', 'action' => 'index', '?'=>['email'=>$emailaddress, 'uuid'=>$uuidparam]]);
                    echo '</li>';
                    echo '<li>';
                }
                echo $this->Html->link($user, ['controller' => 'Users', 'action' => 'view', $loguser['id']]); 
				?>
                </li>
                <li>
                <?php
                echo $this->Html->link(__('logout'), ['controller' => 'Users', 'action' => 'logout']);
			} else {
				echo $this->Html->link(__('login'), ['controller' => 'Users', 'action' => 'login']);
			
			}
			?></li>
             <li>
                        <?= $this->Html->link('Français', [ 'action' => 'changeLang', 'fr_CA'], ['escape' => false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false]) ?>
                    </li>
					<li>
					<?= $this->Html->link('Japanese', ['action' => 'changeLang', 'ja_JP'], ['escape' => false]) ?>
					</li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
