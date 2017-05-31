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
            <input type="search" class="form-control" placeholder="Text input">
            <div>
                <ul class="list-group">
                  <li class="list-group-item">Result 1</li>
                  <li class="list-group-item">Result 2</li>
                  <li class="list-group-item">Result 3</li>
                </ul>
            </div>
        </div>
    </div>

    <?php include('php/page/index_angular_includes.php'); ?>
</body>
</html>
