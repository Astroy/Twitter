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
              <input type="search" class="form-control" ng-model="searchData.textSearch" placeholder="Search">
              <div class="input-group-addon" id="searchBtn" ng-click="search()">Search</div>
            </div>
            <div>
                <ul class="list-group">
                  <li ng-repeat="result in results" class="list-group-item">{{result.text}}</li>
                </ul>
            </div>
        </div>
    </div>

    <?php include('php/page/index_angular_includes.php'); ?>
</body>
</html>
