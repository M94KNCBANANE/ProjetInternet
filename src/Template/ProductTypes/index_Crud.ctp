<?php
$urlToRestApi = $this->Url->build('/api/product_types',true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('ProductTypes/index', ['block' => 'scriptBottom']);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
		
        <title>Product Types with Crud</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="panel panel-default productTypes-content">
                    <div class="panel-heading">Product Types <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
                    <div class="panel-body none formData" id="addForm">
                        <h2 id="actionLabel"><?__('Add Product Types')?></h2>
                        <form class="form" id="productTypesForm">
                            <div class="form-group">
                                <?php
                                echo $this->Form->control('name');
                                ?>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="productTypesAction('add')">Add Product Types</a>
                        </form>
                    </div>
                    <div class="panel-body none formData" id="editForm">
                        <h2 id="actionLabel"><? __('Edit Product Types') ?></h2>
                        <form class="form" id="productTypesForm">
                            <div class="form-group">
                                <?php
                                echo $this->Form->control('name',['id'=> 'nameEdit']);
                                ?>
                            </div>
                            <input type="hidden" class="form-control" name="id" id="idEdit"/>
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="productTypesAction('edit')">Update Product Types</a>
                        </form>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody id="productTypesData">
                            <?php
                                 foreach ($productTypes as $productType):
                                    ?>
                                    <tr>
										<td><?php echo $productType['id']; ?></td>
                                        <td><?php echo $productType['name']; ?></td>
                                        <td>
                                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editproductTypes('<?php echo $productType['id']; ?>')"></a>
                                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? productTypesAction('delete', '<?php echo $productType['id']; ?>') : false;"></a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
	<?= $this->fetch('scriptLibraries') ?>
        <?= $this->fetch('script'); ?>
        <?= $this->fetch('scriptBottom') ?>   
</html>