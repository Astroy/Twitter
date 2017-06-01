var app = angular.module('twitter', []);

app.controller('indexCtrl', function ($scope, $http) {

    var BASE_URL="http://localhost:8888/twitter/";
    var searchUrl=BASE_URL+"php/procedures/twitter_search.php";
    $scope.searchBy="Words";
    $scope.results=[];

    $scope.searchData={textSearch:null,
                      selectedLanguage:null,
                       user:null,
                      username:null};

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
                        console.log( success.data );

            if( success.data.statuses)
                $scope.results = success.data.statuses;
            else
                $scope.results = success.data;
            console.log( $scope.results );
        },function (error){
        });
    }

    $scope.selectLanguage = function(language){
        $scope.searchData.selectedLanguage=language;
        $scope.search();
    }

    $scope.searchUser = function(){
        $scope.searchData.user=null;
        $http({method: 'POST',
               url: searchUrl,
               data: { username: $scope.searchData.username}
              }).then(function (success){
            console.log(success);
            $scope.users = success.data;
            $("#userDropdown").dropdown('toggle');

        },function (error){
        });
    }

    $scope.selectUser = function(user){
        $scope.searchData.username=user.screen_name;
        $scope.searchData.user=user;
        $("#userDropdown").css('display','none');
        $scope.results=[];
        $scope.search();
    }

    $scope.setSearchBy = function(searchBy){
        $scope.searchData.textSearch=null;
        $scope.searchData.user=null;
        $scope.results=[];
        $scope.searchBy=searchBy;
    }
});
