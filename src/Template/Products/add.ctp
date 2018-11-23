<?php
$urlToLinkedListFilter = $this->Url->build(
["controller" => "country",
"action"=> "getCountries",
"_ext"=> "json"]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Products/add', ['block'=> 'scriptBottom']);

$loguser = $this->request->session()->read('Auth.User');

$urlToEditorsAutocompleteJson = $this->Url->build([
    "controller" => "products",
    "action" => "findTypes",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToEditorsAutocompleteJson . '";', ['block' => true]);
echo $this->Html->script('ProductTypes/autocomplete', ['block' => 'scriptBottom']);

?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>

        <?php if($loguser['type']%3 == 2 ):  ?>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <?php 
        endif;
        if($loguser['type'] == 3):  ?>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stores'), ['controller' => 'Stores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Stores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Items'), ['controller' => 'OrderItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Item'), ['controller' => 'OrderItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <?php endif; ?>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="countryController">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php 
            echo $this->Form->control('name');
            echo $this->Form->control('files._ids', ['options' => $files]);
            echo $this->Form->control('price');
            echo $this->Form->control('description');
            ?>
            <div>
            Country:
            <select name="Country_id"
                    id="country-id"
                    ng-model="country"
                    ng-options="country.name for country in countries track by country.id">
                    
                    <option value=''>Select</option>
                    </select>
            </div>
            <div>
            City:
            <select name="city_id"
                    id="city-id"
                    ng-disabled="!country"
                    ng-model="city"
                    ng-options="CurrentCity.name for CurrentCity in country.city track by CurrentCity.id"
                    >
                    <option value=''>Select</option>
                    </select>
            </div>
            <?php
            echo $this->Form->control('productType_id' , ['id' => 'autocomplete', 'type' => 'text']);
            if($loguser['type']%3 == 2){
                echo $this->Form->hidden('store_id', ['value' => $stores['id']]);
            }else{
            echo $this->Form->control('store_id', ['options' => $stores]);
            }
            echo $this->Form->hidden('deleted', ['value'=> false]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
