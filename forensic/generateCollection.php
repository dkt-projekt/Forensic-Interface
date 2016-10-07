<?php
	$siteTitle = 'Generate Collection - Forensic';
	require_once('lib2.php');
        $user = getSession('forensicUser','');
        /*if($user==''){
		echo 'ERROR';
                exit(0);
        }*/

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
	$pipeline = trim(getForm('analysis',''),',');
//        require_once('getAnalysis.php');

//	echo "--".$pipeline."--";
        $data = array(
                'collectionName' => $name,
                'description' => $description,
                'user' => $user,
	        'pipeline' => $pipeline
        );

//var_dump($data);

	$result = CallAPI2("POST", "http://dev.digitale-kuratierung.de/api/data-backend/createCollection", $data);
	$errormessage = '';
	if(strpos($result,"successfully")==false){
		$errormessage = 'Error at generating the collection:<br/>'.$result;
		echo $errormessage;
		exit(0);
	}
	else{
		$message = $result;
		echo $message;
	}


echo $result;
exit(0);

	$output = '';
	$fileNamesArray = explode(",",$fileNames);
	foreach ($fileNamesArray as $target_file){
//		$parseTypes = explode("#",$target_file_withtype);
		//$target_file = $parseTypes[0];
		//$format = $parseTypes[1];
//$output = $output.','.$target_file;
		//$filecontent = file_get_contents($target_file);
	        $dataInd = array(
		        'documentName' => $documentName,
        		'user' => $user,
		        'fileName' => $target_file,
		        'pipeline' => $pipeline
	        );
//        var_dump($data);
//      echo '<br/>';
//      echo '<br/>';
//      echo '<br/>';

		$contentType = '';
		echo $target_file.',';
		echo "http://dev.digitale-kuratierung.de/api/data-backend/".$name."/documents";
		if(($temp = strlen($documentName) - strlen('.zip')) >= 0 && strpos($documentName, '.zip', $temp) !== false){
			$contentType = 'application/zip';
	        	$result = CallAPI3("POST", "http://dev.digitale-kuratierung.de/api/data-backend/".$name."/documents", $dataInd, $contentType);
		}
		else{
	        	$result = CallAPI2("POST", "http://dev.digitale-kuratierung.de/api/data-backend/".$name."/documents", $dataInd);
		}
echo $result;
exit(0);
	        //$json = json_decode($result);
//      var_dump($json);
//      exit(0);
	        if(strpos($result,"successfully")==false){
			$output = $output.' Error at including the document: '.$documentName.'.';
	        }
	        else{
			$output = $output.' Successfully added document: '.$documentName.'.';
	        }
	}
	echo $output;
	exit(0);
?>
