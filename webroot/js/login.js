var app = angular.module('app',[]);


app.controller('usersCtrl', function ($scope, $http) {
    // more angular JS codes will be here

    // Login Process
    $scope.login = function () {

        var req = {
            method: 'POST',
            url: 'api/users/token',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            data: {username: $scope.username, password: $scope.password}
        }
        // fields in key-value pairs
        $http(req)
                .success(function (jsonData, status, headers, config) {
                    // console.log(jsonData.data.token);
                    // tell the user was logged
                    Materialize.toast('User sucessfully logged in', 4000);
                    localStorage.setItem('token', jsonData.data.token);
                    localStorage.setItem('user_id', jsonData.data.id);
  
                })
                .error(function (data, status, headers, config) {
                    //console.log(data.response.result);
                    // tell the user was not logged
                    Materialize.toast(data.message, 4000);
                });

    }
    // Login Process
    $scope.logout = function () {
        localStorage.setItem('token', "no token");
    }
    $scope.changePassword = function () {
        var req = {
            method: 'PUT',
            url: 'api/users/' + localStorage.getItem("user_id"),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")
            },
            data: {'password': $scope.newPassword}
        }
        $http(req)
                .success(function (response) {
                    // tell the user subcategory record was updated
                    Materialize.toast('Password successfully changed', 4000);

                })
                .error(function (response) {
                    // tell the user subcategory record was not updated
                    //console.log(response);
                    Materialize.toast('Could not update Password', 4000);

                });
    }
});