var app = angular.module('twitter', []);

app.controller('indexCtrl', function ($scope, $http) {

    var BASE_URL="http://localhost:8888/twitter/";
    var searchUrl=BASE_URL+"php/procedures/twitter_search.php";

    $scope.results=[];

    $scope.searchData={textSearch:null,
                      selectedLanguage:null};

    //get init data

    //if getAllLanguages==true, the search will return all the languages recognised by Twitter
    $http({method: 'POST',
           url: searchUrl,
           data: { getAllLanguages: true }
          }).then(function (success){
        console.log(success);
        $scope.languages = success.data;
    },function (error){
    });


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


    $scope.selectLanguage = function(language){
        $scope.searchData.selectedLanguage=language;
    }
});
