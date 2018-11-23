var app = angular.module('linkedlists', []);

app.controller('countryController', function ($scope, $http){
    $http.get(urlToLinkedListFilter).then(function (response){
        $scope.countries = response.data
    });
});


