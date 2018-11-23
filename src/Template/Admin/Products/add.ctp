<?php
$urlToLinkedListFilter = $this->Url->build(
["controller" => "country",
"action"=> "getCountry",
"_ext"=> "json"]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Products/add', ['block'=> 'scriptBottom']);

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

        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php 
            echo $this->Form->control('id');
            echo $this->Form->control('name');
            echo $this->Form->control('files._ids', ['options' => $files]);
            echo $this->Form->control('price');
            echo $this->Form->control('description');
            echo $this->Form->control('city_id', ['options' => $city]);
            echo $this->Form->control('productType_id' , ['id' => 'autocomplete', 'type' => 'text']);
            echo $this->Form->control('store_id', ['options' => $stores]);
            echo $this->Form->hidden('deleted', ['value'=> false]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
