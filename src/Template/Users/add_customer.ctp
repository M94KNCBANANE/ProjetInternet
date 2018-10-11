<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->hidden('type',  ['value' => '4']);
            echo $this->Form->control('name', ['required'=> true]);
            echo $this->Form->control('phone', ['required'=> true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
