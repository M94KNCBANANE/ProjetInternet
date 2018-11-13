<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td>
                <?php foreach ($product->files as $files): ?>
                            <?php
                            echo $this->Html->image($files->path . $files->name, [
                                
                                "alt" => $files->name,
                                "width" => "150px",
                                "height" => "150px",
                            ]);
                            ?>
                <?php endforeach; ?>

            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type') ?></th>
            <td><?= $product->has('product_type') ? $this->Html->link($product->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $product->product_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Store') ?></th>
            <td><?= $product->has('store') ? $this->Html->link($product->store->name, ['controller' => 'Stores', 'action' => 'view', $product->store->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->currency($product->price, "USD") ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= $product->deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($product->description)); ?>
    </div>   
    <div class="related">
        <h4><?= __('Related Items') ?></h4>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('name') ?></th>
                <th scope="col"><?= __('price') ?></th>
                <th scope="col"><?= __('productType_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>

            <?php foreach ($products as $item): ?>
            <tr>
                <?php if($item['store_id'] == $product['store_id'] && $item['id'] != $product['id'] && $item->deleted == null){ ?>
                <td><?= h($item->name) ?></td>
                <td><?= $this->Number->currency($item->price, "USD") ?></td>
                
                <td><?= $item->has('product_type') ? $this->Html->link($item->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $item->product_type->id]) : '' ?></td>
                <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                   </td>
                <?php } ?>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>