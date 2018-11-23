var app = angular.module('app',[]);

app.controller('ProductTypeCRUDCtrl', ['$scope','ProductTypeCRUDService', function ($scope,ProductTypeCRUDService) {
	  
    $scope.updateProductType = function () {
        ProductTypeCRUDService.updateProductType($scope.productType.id,$scope.productType.name)
          .then(function success(response){
              $scope.message = 'Product Type data updated!';
              $scope.errorMessage = '';
              $scope.productType.id = '';
                $scope.productType.name = '';
              $scope.getAllProductTypes();
          },
          function error(response){
              $scope.errorMessage = 'Error updating Product Type!';
              $scope.message = '';
          });
    }
    
    $scope.getProductType = function ($id) {

        ProductTypeCRUDService.getProductType($id)
          .then(function success(response){
              $scope.productType = response.data.data;
              $scope.productType.id = $id;
              $scope.message='';
              $scope.errorMessage = '';
              $scope.getAllProductTypes();
              
          },
          function error (response ){
              $scope.message = '';
              if (response.status === 404){
                  $scope.errorMessage = 'Product Type not found!';
              }
              else {
                  $scope.errorMessage = "Error getting Product Type!";
              }
          });
    }
    
    $scope.addProductType = function () {
        if ($scope.productType != null && $scope.productType.name) {
            ProductTypeCRUDService.addProductType($scope.productType.name)
              .then (function success(response){
                  $scope.message = 'Product Type added!';
                  $scope.errorMessage = '';
                  $scope.productType.id = '';
                  $scope.productType.name = '';
                  $scope.getAllProductTypes();
              },
              function error(response){
                  $scope.errorMessage = 'Error adding Product Type!';
                  $scope.message = '';
            });
        }
        else {
            $scope.errorMessage = 'Please enter a name!';
            $scope.message = '';
        }
    }
    
    $scope.deleteProductType = function ($id) {
        ProductTypeCRUDService.deleteProductType($id)
          .then (function success(response){
              $scope.message = 'Product Type deleted!';
              $scope.productType = null;
              $scope.errorMessage='';
              $scope.getAllProductTypes();
          },
          function error(response){
              $scope.errorMessage = 'Error deleting Product Type!';
              $scope.message='';
          })
    }
    
    $scope.getAllProductTypes = function () {
        ProductTypeCRUDService.getAllProductTypes()
          .then(function success(response){
              $scope.productTypes = response.data.data;
              $scope.message='';
              $scope.errorMessage = '';
          },
          function error (response ){
              $scope.message='';
              $scope.errorMessage = 'Error getting Product Types!';
          });
    }
    $scope.getAllProductTypes();
}]);

app.service('ProductTypeCRUDService',['$http', function ($http) {
	
    this.getProductType = function getProductType(productTypeId){
        return $http({
          method: 'GET',
          url: urlToRestApi+'/'+productTypeId,
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        });
	}
	
    this.addProductType = function addProductType(name){
        return $http({
          method: 'POST',
          url: urlToRestApi,
          data: {name:name},
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        });
    }
	
    this.deleteProductType = function deleteProductType(id){
        return $http({
          method: 'DELETE',
          url: urlToRestApi+'/'+id ,
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        })
    }
	
    this.updateProductType = function updateProductType(id,name){
        return $http({
          method: 'PATCH',
          url: urlToRestApi+'/'+id,
          data: {name:name},
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        })
    }
	
    this.getAllProductTypes = function getAllProductTypes(){
        return $http({
          method: 'GET',
          url: urlToRestApi,
          headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}

        });
    }

}]);
