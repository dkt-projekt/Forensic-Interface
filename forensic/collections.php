<?php
        $siteName = 'collections';
        $siteTitle = 'Collections - Information Forensics';
        require_once('lib2.php');
	require_once("head.php");
//	$user = getSession('forensicUser','');
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
$navbarPath = 'collections';
require_once("header.php");
?>

    <div class="row"style="padding-top:50px; padding-left:120px">
    	<div class="col-lg-1 col-md-2 col-sm-2" style="margin:0px;text-align:center;">
    		<a href="newCollection.php">
    			<i class="fa fa-plus-square-o fa-4x" aria-hidden="true" style=""></i>
    			<p>Create New Collection</p>
    		</a>
    	</div>

<?php
        $data = array('user' => $user);
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
        //$result2 = CallAPI2("GET", "http://dev.digitale-kuratierung.de/api/e-parrot/listCollections", $data2);
        //$json2 = json_decode($result2);
        //$number2 = count($json2->collections);

        //if($number==0 && $number2==0){
        if($number==0){
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
    <div class="col-lg-1 col-md-2 col-sm-4" style="margin:0px;text-align:center;">
                            <a href="collectionDetail.php?collectionId=<?php echo $cn; ?>">
                            <img src="images/collectionLogo.svg" alt="Collection Logo" height="100%" width="100%"/>
                            <p><?php echo substr($cn,0,10).'..'; ?></p>
                            </a>
    </div>

    <!--<div class="col-lg-3 col-md-4 col-sm-6" style="margin:0px;border-width:2px;border-style: solid;">
                            <div class="caption">
                                <h4><a href="collectionDetail.php?collectionId=<?php echo $cn; ?>"><?php echo $cn; ?></a></h4>
                                <p><a href="collectionDetail.php?collectionId=<?php echo $cn; ?>">See complete collection</a></p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $notpro; ?><i class="fa fa-exclamation-triangle"></i></p>
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $currently; ?><i class="fa fa-gears fa-hourglass-half"></i></p>
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $error; ?><i class="fa fa-times"></i></p>
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $processed; ?><i class="fa fa-check"></i></p>
                            </div>
    </div>-->
<?php
                }
                foreach($json2->collections as $obj){
                        $cn = $obj->collectionName;
                        $ci = $obj->collectionId;
                        $desp = $obj->collectionDescription;
?>
    <!--<div class="col-lg-1 col-md-2 col-sm-4" style="margin:0px;border-width:2px;border-style: solid;text-align:center;">
    <div class="col-lg-1 col-md-2 col-sm-4" style="margin:0px;text-align:center;">
            		    <a href="collectionDetail.php?collectionId=<?php echo $cn; ?>">
			    <img src="images/collectionLogo.svg" alt="Collection Logo" height="100%" width="100%"/>
                            <p><?php echo substr($cn,0,10).'..'; ?></p>
            		    <p><?php echo $desp; ?></p>
                            <div class="ratings">
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $notpro; ?><i class="fa fa-exclamation-triangle"></i></p>
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $currently; ?><i class="fa fa-gears fa-hourglass-half"></i></p>
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $error; ?><i class="fa fa-times"></i></p>
                                <p class="pull-right" style="margin-right:20px;"> <?php echo $processed; ?><i class="fa fa-check"></i></p>
                            </div>
			    </a>
    </div>-->

<?php
                }


	}
?>
  </div>
</div>
</div>
<?php
	require_once("footer.php");
?>
</body>
</html> 

