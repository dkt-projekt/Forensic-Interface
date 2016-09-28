<?php
        $siteName = 'collections';
        $siteTitle = 'Collections - Information Forensics';
        require_once('lib2.php');
	require_once("head.php");

	$user = getSession('forensicUser','');

?>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<div id="m" class="container-fluid">
<?php
require_once("sidebar.php");
?>

<div id="main" class="containerr">
<?php
require_once("header.php");
?>
  <div class="row">
    <div class="col-lg-3 col-md-4 col-sm-6" style="margin:0px;border-width:2px;border-style: solid;">
                                <h4 class="pull-right"><i class="fa fa-plus-square-o"></i></h4>
                                <h4><a href="newCollection.php">Add New Collection</a></h4>
                                <p>In order to create / add a new collection click at <a href="newCollection.php">Create New Collection</a>.</p>
    </div>

<?php
        $data = array(
//                'language' => 'en',
//                'serviceType' => 'database',
                'user' => $user
        );
      $result = CallAPI2("GET", "http://dev.digitale-kuratierung.de/api/document-storage/collections", $data);
	$result = str_replace('[','',$result);
	$result = str_replace(']','',$result);
	$result = str_replace('"','',$result);
	$collectionNames = explode(',',$result);
        /*$json = json_decode($result);*/
        $number = count($collectionNames);

        $data2 = array(
//                'language' => 'en',
//                'serviceType' => 'database',
                'user' => $user
        );
        $result2 = CallAPI2("GET", "http://dev.digitale-kuratierung.de/api/e-parrot/listCollections", $data2);
        $json2 = json_decode($result2);
        $number2 = count($json2->collections);

        if($number==0 && $number2==0){
                echo '<div class="row">';
                echo '    <div class="col-lg-12">';
                echo '<div class="well well-lg"><h4>There are no collections for now.</h4></div>';
                echo '    </div>';
                echo '</div>';
        }
        else{
                foreach($collectionNames as $cn){
		        $data = array( 'user' => $user );
			$resultCol = CallAPI2("GET", "http://dev.digitale-kuratierung.de/api/document-storage/collections/".$cn."/status", $data);
		        $obj = json_decode($resultCol);
			$processed = $obj->counts->PROCESSED;
			$error = $obj->counts->ERROR;
			$currently = $obj->counts->CURRENTLY_PROCESSING;
			$notpro = $obj->counts->NOT_PROCESSED;

?>
    <div class="col-lg-3 col-md-4 col-sm-6" style="margin:0px;border-width:2px;border-style: solid;">
                            <div class="caption">
                                <!--<h4 class="pull-right">$24.99</h4>-->
                                <h4><a href="collectionDetail.php?collectionId=<?php echo $cn; ?>"><?php echo $cn; ?></a></h4>
                                <p><a href="collectionDetail.php?collectionId=<?php echo $cn; ?>">See complete collection</a></p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $notpro; ?><i class="fa fa-exclamation-triangle"></i></p>
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $currently; ?><i class="fa fa-gears fa-hourglass-half"></i></p>
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $error; ?><i class="fa fa-times"></i></p>
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $processed; ?><i class="fa fa-check"></i></p>
                            </div>
    </div>
<?php
		}
                foreach($json2->collections as $obj){
			$cn = $obj->collectionName;
			$ci = $obj->collectionId;
?>
    <div class="col-lg-3 col-md-4 col-sm-6" style="margin:0px;border-width:2px;border-style: solid;">
                            <div class="caption">
                                <!--<h4 class="pull-right">$24.99</h4>-->
                                <h4><a href="collectionDetail.php?collectionId=<?php echo $cn; ?>"><?php echo $cn; ?></a></h4>
                                <p><a href="collectionDetail.php?collectionId=<?php echo $ci; ?>">See complete collection</a></p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $notpro; ?><i class="fa fa-exclamation-triangle"></i></p>
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $currently; ?><i class="fa fa-gears fa-hourglass-half"></i></p>
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $error; ?><i class="fa fa-times"></i></p>
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $processed; ?><i class="fa fa-check"></i></p>
                            </div>
    </div>

<?php
                }

	}
?>

<!--<div ng-view></div>-->
<!--    <div class="col-md-3" ng-repeat="collection in collections" style="width:25%;margin:0px;border-width:2px;border-style: solid;">
                            <div class="caption">
                                <h4><a href="#">{{collection.name}}</a></h4>
                                <p><a href="">See complete collection</a></p>
                            </div>
    </div>-->

    <!--<div class="col-md-3" style="width:25%;margin:0px;border-width:2px;border-style: solid;height:280px">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">$24.99</h4>
                                <h4><a href="#">First Product</a>
                                </h4>
                                <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
    </div>-->
  </div>
</div>
</div>
<?php
	require_once("footer.php");
?>
</body>
</html> 

