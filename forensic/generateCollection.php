<?php
	$siteTitle = 'Generate Collection - Forensic';
	require_once('lib2.php');
        $user = getSession('forensicUser','');
        if($user==''){
		echo 'ERROR';
                exit(0);
        }

	$name = getForm('collectionName','');
	if($name==''){
		$name = 'collection'.date('YmdHis');
	}
	$fileNames = trim(getForm('files',''),',');
	if($fileNames==''){
		echo 'ERROR: you must at least upload one file!';
		exit(0);
	}
//	echo 'We have received name '.$name.' and files '.$fileNames;
//	exit(0);
	$description = getForm('description','');
	$private = getForm('private','true');
	$users = getForm('users',$user);
        require_once('getAnalysis.php');

	echo "--".$analysis."--";

        $data = array(
                'collectionName' => $name,
                'description' => $description,
                'private' => $private,
                'user' => $user,
	        'analysis' => trim($analysis,","),
                'users' => $users
        );

//var_dump($data);
/*
//	$result = CallAPI2("POST", "http://dev.digitale-kuratierung.de/api/e-parrot/createCollection", $data);
*/
	$errormessage = '';
	if(strpos($result,"successfully")==false){
		$errormessage = 'Error at generating the collection:<br/>'.$result;
		echo $errormessage;
		exit(0);
	}
	else{
		$message = $result;
		echo $message;
		exit(0);
	}

/*	echo ''.getForm('','');
	exit(0);
*/
	$fileNamesArray = explode(",",$fileNames);
	foreach ($fileNamesArray as $target_file_withtype){
		$parseTypes = explode("#",$target_file_withtype);
		//$target_file = $parseTypes[0];
		//$format = $parseTypes[1];

		$filecontent = file_get_contents($target_file);
		createDocument($name,$name.'_1','',$user,$format,$filecontent,$analysis);
	}
	/*
	//$target_dir = "/tmp/";
        //$target_file = $target_dir . basename($_FILES["filefile"]["name"]);
        $target_file = $target_dir . basename($_FILES["filefile"]["name"]);
        if ($_FILES["filefile"]["size"] > 500000) {
	        $errormessage = "Sorry, your file is too large.";
        }
	else{
//	        echo $target_file.'<br/>';
	        if (move_uploaded_file($_FILES["filefile"]["tmp_name"], $target_file)) {
			$filecontent = file_get_contents ($target_file);
			createDocument($name,$name.'_1','',$user,$format,$filecontent,$analysis);
		} else {
			$errormessage = "Sorry, there was an error uploading your file.";
		}
	}*/
	exit(0);
?>
