<?php

session_start();

function getForm($var, $default = '') {
  if(isset($_POST[$var]))
    return $_POST[$var];
  elseif(isset($_GET[$var]))
    return $_GET[$var];
  else
    return $default;
}
	
	$mainFact = getForm('mainfact','');
	
	$_SESSION["dkt_mainfact"] = $mainFact;

/*echo 'Type: '.$storyType.'<br/>';
echo 'Mainfact: '.$mainFact.'<br/>';
echo 'Type: '.$_SESSION["dkt_storytype"].'<br/>';
echo 'Mainfact: '.$_SESSION["dkt_mainfact"].'<br/>';
*/
	$array = array(
		$mainFact => array(
			"id" => '1',
			"array" => null
		)
	);
	$_SESSION["dkt_arrayvalue"] = $array;
	header('location: results.php');
	exit(0);
?>
