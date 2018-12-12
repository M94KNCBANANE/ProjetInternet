var onloadCallback = function() {
    widgetId1 = grecaptcha.render('example1', {
        'sitekey' : '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'theme' : 'light'
    });
};

var app = angular.module('app',[]);


app.controller('usersCtrl', function ($scope, $compile,$http) {
    // more angular JS codes will be here

    // Login Process
    $scope.login = function () {
        
        if(grecaptcha.getResponse(widgetId1)==''){
            $scope.captcha_status='Please verify captha.';
            return;
        }
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
                    
                    localStorage.setItem('token', jsonData.data.token);
                    localStorage.setItem('user_id', jsonData.data.id);
                    $('#logDiv').html(
                        $compile('<a href="javascript:void(0);" class="glyphicon glyphicon-log-out" id="login-btn" onclick="javascript:$(\'#changeForm\').slideToggle();">Logout/Modify</a>')($scope)
                    );

                    $('#loginForm').slideUp();
                    $scope.errorLogin ='';
                })
                .error(function (data, status, headers, config) {
                    $scope.messageLogin = '';
                    $scope.errorLogin = 'Invalid credentials';
                });

    }
    // Login Process
    $scope.logout = function () {
        localStorage.setItem('token', "no token");

        $('#logDiv').html(
            $compile('<a href="javascript:void(0);" class="glyphicon glyphicon-log-in" id="login-btn" onclick="javascript:$(\'#loginForm\').slideToggle();">Login</a>')($scope)
        );

        $('#changeForm').slideUp();
        $scope.messageLogin = 'You have logged out';
        $scope.errorLogin = '';

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
            $('#changeForm').slideUp();
            $scope.messageLogin = 'Password has been changed! ';
            emptyInputPass();
        })
        .error(function (response) {
            $scope.errorLogin = 'Cannot change the password!';

        });
    }
});