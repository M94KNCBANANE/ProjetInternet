<!DOCTYPE html>
<html ng-app="app">
<head>
<meta charset="ISO-8859-1">
<title>Product Type CRUD</title>
    <?php
$urlToRestApi = $this->Url->build('/api/product_types',true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('ProductTypes/index', ['block' => 'scriptBottom']);
?>
<style>
a {
	cursor: pointer;
	background-color: lightblue;
}
</style>
</head>
<body>
	<div ng-controller="ProductTypeCRUDCtrl">
			<table>
				<tr>
					<td width="100">ID:</td>
					<td><input type="text" id="id" ng-model="productType.id" /></td>
				</tr>
				<tr>
					<td width="100">Name:</td>
					<td><input type="text" id="name" ng-model="productType.name" /></td>
				</tr>

			</table>
			<br /> <br /> 
			<a ng-click="updateProductType(productType.id,productType.name)">Update ProductType</a> 
			<a ng-click="addProductType(productType.name)">Add ProductType</a> 
		<br /> <br />
		<p style="color: green">{{message}}</p>
		<p style="color: red">{{errorMessage}}</p>

		<br />
		<br /> 
		<br /> <br />
         
        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                                    <tr ng-repeat="type in productTypes">
										<td>{{type.id}}</td>
                                        <td>{{type.name}}</td>
										
                                        <td>
                                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" ng-click="getProductType(type.id)"></a>
                                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" ng-click="deleteProductType(type.id)"></a>
                                        </td>
                                    </tr>
                    </table>
	</div>
</body>
</html>