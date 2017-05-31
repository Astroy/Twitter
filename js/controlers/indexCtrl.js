var app = angular.module('twitter', []);

app.controller('indexCtrl', function ($scope, $http) {

    var BASE_URL="http://localhost:8888/twitter/";
    var searchUrl=BASE_URL+"php/procedures/twitter_search.php";

    $scope.results=[];

    $scope.searchData={textSearch:null};


    $scope.search = function(){
        $http({
            method: 'POST',
            url: searchUrl,
            data: $scope.searchData
        }).then(function (success){
            console.log(success);
            $scope.results = success.data.statuses;
        },function (error){

        });
    }

});
