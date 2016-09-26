<?php

session_start();

$collectionId2 = $_SESSION["forensicCollectionId"];

//echo $collectionId2;

require_once("relations".$collectionId2.".php");

//echo '-------'.$collectionId2;
//exit(0);
function getForm($var, $default = '') {
  if(isset($_POST[$var]))
    return $_POST[$var];
  elseif(isset($_GET[$var]))
    return $_GET[$var];
  else
    return $default;
}
function fillArray($id,$smallArray){
	$array = array();
	$counter=1;
	foreach ($smallArray as $verb => $objectArray) {
		foreach ($objectArray as $object => $number) {
			$array[$object] = array(
				"verb" => $verb,
				"id" => $id.".".$counter,
				"array" => null
			);
			$counter = $counter+1;
		}
	}
//echo '-----<br/>';
//var_dump($array);
//echo '-----<br/>';

	return $array;
}
function checkNode($id,$smallArray,$array){
	if($array==null){
		return null;
	}
//var_dump($array);
//echo '<br/>';
//echo '<br/>';
//var_dump($smallArray);
	foreach ($array as $i => $value) {
//echo $id.'.---'.$value["id"].'.'.'<br/>';
		if($value["id"].'.'==$id.'.'){
//echo $id.'.---'.$value["id"].'.'.'<br/>';
			if($array[$i]["array"]==null){
//echo $id.'.---'.$value["id"].'.'.'<br/>';
				$array[$i]["array"] = fillArray($id,$smallArray);
			}
			else{
				$array[$i]["array"] = null;
			}
		}
		else{
//echo $id.'.---'.$value["id"].'.'.'<br/>';
//			if(strpos($id,$value["id"].'.')==0){
				$array[$i]["array"] = checkNode($id,$smallArray,$value["array"]);//Start looping in the child.	
//			}
//			else{
//			}
		}
	}
	return $array;
}
	
	$uri = getForm('uri','');
	$id = getForm('id','');
	$array = $_SESSION["dkt_arrayvalue"];
//echo $uri;
//echo '<br/><br/><br/>';
//echo $id;
//echo '<br/><br/><br/>';
//var_dump($array);
//echo '<br/><br/><br/>';
	//Store the related information in the $array.
//echo 'uri: '.$uri.'<br/>';
	$smallArray = $relations[$uri];

//var_dump($smallArray);
//echo '<br/>';
//echo '<br/>';
	$array = checkNode($id,$smallArray,$array);

	//Cleaning the child will be done later.
//var_dump($array);
//echo '<br/>';
//echo '<br/>';

/*echo '<br/>';
echo '<br/>';
        foreach ($relations as $k => $v) {
		echo $k.'<br/>';
		if($k==$uri){
			echo '======================================';
		}
	}*/
//echo '<br/>';
	$_SESSION["dkt_arrayvalue"] = $array;
	header('location: results.php');
	exit(0);
?>
