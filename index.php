<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('php/page/index_head.php'); ?>
    </head>
    <body ng-app="twitter" >
        <div class="row" ng-controller="indexCtrl">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2" >
                <h1>Twitter Search</h1>
                <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon glyphicon-cog" ng-click="advancedSearch=!advancedSearch" aria-hidden="true"></span></div>
                    <input type="search" class="form-control" ng-model="searchData.textSearch" ng-change="search()" placeholder="Search">
                    <div class="input-group-addon" id="searchBtn"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </div>
                </div>

                <div class="panel panel-default" ng-if="advancedSearch">
                    <div class="panel-body advancedSearchDiv">
                        <p>Language </p>
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span ng-if="!searchData.selectedLanguage">Select language</span>
                                <span ng-if="searchData.selectedLanguage">{{searchData.selectedLanguage.name}}</span>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdownMenuLanguages" aria-labelledby="dropdownMenu1">
                                <li ng-repeat="language in ::languages"><a ng-click="selectLanguage(language)">{{language.name}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <ul class="list-group">
                        <li ng-repeat="result in results" class="list-group-item result">
                            <div class="row">
                                <img class="col-md-1 thumbnail" ng-src="{{result.user.profile_image_url}}"/>
                                <div class="col-md-11 textDiv">
                                    <p class="usernameP">@{{result.user.screen_name}}</p>
                                    <p> {{result.text}}</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <?php include('php/page/index_angular_includes.php'); ?>
    </body>
</html>
