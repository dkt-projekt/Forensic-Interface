<?php
require_once('lib2.php');

$fileName = $_FILES['file']['name'];
$fileType = $_FILES['file']['type'];
$fileSize = $_FILES['file']['size'];
$fileContent = file_get_contents($_FILES['file']['tmp_name']);

$target_dir = "/tmp/forensic/";
//$filefile = getForm('filefile','');
//echo 'filefile: '.$filefile.'<br/>';
$target_file = $target_dir . 'forensic_'.date('YmdHis').'_'.basename($fileName);
if ($fileSize > 500000000) {
	echo 'ERROR: your file is too large:'.$fileSize;
}
else{
	//      echo $target_file.'<br/>';
	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		echo $target_file;
		//$filecontent = file_get_contents ($target_file);
		//createDocument($name,$name.'_1','',$user,$format,$filecontent,$analysis);
	} else {
		echo 'ERROR: there was an error uploading your file.';
	}
}
?>
