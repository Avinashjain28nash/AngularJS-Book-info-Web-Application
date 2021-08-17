var app = angular.module('myApp', [])
app.controller('myController', function($scope, $http) {
    $scope.btname = 'ADD'
    $scope.insertIntoDB = function() {

        if ($scope.usn == null) {
            alert('Enter Usn')
            return;
        }
        else if ($scope.name == null) {
            alert('Enter Name')
            return;
        } else if ($scope.phone == null) {
            alert('Enter Phone')
            return;
        } else if ($scope.book == null) {
            alert('Enter Book name')
            return; 
        } else if ($scope.status == null) {
            alert('Enter Status')
            return;
        }
        $http.post('insert.php', {
            'send_usn': $scope.usn,
            'send_name': $scope.name,
            'send_phone': $scope.phone,
            'send_book': $scope.book,
            'send_status': $scope.status,
            'send_btnName': $scope.btname,
            'send_id': $scope.id
        }).success(function(data) {
            alert(data);
            $scope.loadTable();
            $scope.usn = null;
            $scope.name = null;
            $scope.phone = null;
            $scope.book = null;
            $scope.status = null;
            $scope.btname = 'ADD'

        })

    }

    $scope.loadTable = function() {
        $http.get('select.php').success(function(data) {
            $scope.JSONValues = data;
        })
    }

    $scope.updateDB = function(id, usn, name, phone, book, status) {

        $scope.id = id;
        $scope.usn = usn;
        $scope.name = name;
        $scope.phone = phone;
        $scope.book = book;
        $scope.status = status;
        $scope.btname = 'Update'

    }


    $scope.deleteDB = function(id) {
            if (confirm('Are You Sure, You Want to Delete')) {
                $http.post('delete.php', { 'send_id': id }).success(function(data) {
                alert(data)
                $scope.loadTable();
                })
           } else {
                false;
            }
        }
    })

    
