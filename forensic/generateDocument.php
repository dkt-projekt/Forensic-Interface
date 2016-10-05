<?php
	$siteTitle = 'Generation Document - Forensic';
	require_once('lib2.php');
	$user = getSession('forensicUser','');
	/*if($user==''){
		header('location: index.php');
		exit(0);
	}*/
	$collectionId = getSession('collectionId','');
        $collectionName = getSession('collectionName','');

	if($collectionId==''){
		header('location: collections.php');
		exit(0);
	}
	$name = getForm('documentName','');
        if($name==''){
                $name = 'document'.date('YmdHis');
        }
        $fileNames = trim(getForm('files',''),',');
        if($fileNames==''){
                echo 'ERROR: you must at least upload one file!';
                exit(0);
        }

        $description = getForm('description','');
        require_once('getAnalysis.php');

        echo "--".$analysis."--";

        $parseTypes = explode("#",$fileNames);
        $target_file = $parseTypes[0];
        $format = $parseTypes[1];

        $filecontent = file_get_contents($target_file);
        createDocument($collectionId,$name,'',$user,$format,$filecontent,$analysis);

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
/*      echo ''.getForm('','');
        exit(0);
*/
?>
