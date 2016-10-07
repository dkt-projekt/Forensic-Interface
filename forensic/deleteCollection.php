<?php
	$siteTitle = 'Delete Collection - Forensic';
	require_once('lib2.php');
        $user = getSession('forensicUser','');

	$collectionId = getForm('collectionId','');
	if($collectionId==''){
		header('location: collections.php');
		exit(0);
	}
        $data = array(
        );

	$result = CallAPI2("DELETE", "http://dev.digitale-kuratierung.de/api/data-backend/".$collectionId, $data);
	$errormessage = '';
	if(strpos($result,"successfully")==false){
		$errormessage = 'Error at deleting the collection:<br/>'.$result;
		header('location: collections.php?errormessage='.$errormessage);
		exit(0);
	}
	else{
		header('location: collections.php');
		exit(0);
	}
?>
