<?php
        $siteName = 'collections';
        $siteTitle = 'Collections - Information Forensics';
        require_once('lib2.php');
	require_once("head.php");
?>
<body ng-controller="CollectionListController">
<div id="m" class="container-fluid">
<?php
require_once("sidebar.php");
?>

<div id="main" class="containerr">
<?php
require_once("header.php");
?>
  <div class="row">

  <ul>
    <li ng-repeat="collection in collections">
      <span>{{collection.name}}</span>
    </li>
  </ul>
    <div class="col-md-3" ng-repeat="collection in collections" style="width:25%;margin:0px;border-width:2px;border-style: solid;">
                            <div class="caption">
                                <!--<h4 class="pull-right">$24.99</h4>-->
                                <h4><a href="#">{{collection.name}}</a></h4>
                                <p><a href="">See complete collection</a></p>
                            </div>
    </div>
  </div>
</div>
</div>
<?php
	require_once("footer.php");
?>
</body>
</html> 

