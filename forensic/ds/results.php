<?php
session_start();
        $storyType = $_SESSION["dkt_storytype"];
        $mainFact = $_SESSION["dkt_mainfact"];
        $array = $_SESSION["dkt_arrayvalue"];
	
	function printNode($id,$array){
		foreach ($array AS $key => $val):
			$onePar = strpos($key,'(');
			$twoPar = strpos($key,')');
			$mainURL = substr($key, $onePar+1, $twoPar-$onePar-1);
			$mainText = substr($key, 0, $onePar);
			echo '<li><span class="verb">'.$val["verb"]."</span><a href=\"javascript:defineAttribute('".$key."','".$val["id"]."')\">".$mainText.'</a>';
			if ($val["array"]!=null){
				echo '<ul>';
				printNode($val["id"],$val["array"]);
				echo '</ul>';
			}
			echo '</li>';
		endforeach;
	}

	if($mainFact == ''){
		echo '<h1>There is no many fact selected. Select a story type and main fact.</h1><br/>';
	}
	else{
		$onePar = strpos($mainFact,'(');
		$twoPar = strpos($mainFact,')');
		$mainURL = substr($mainFact, $onePar+1, $twoPar-$onePar-1);
		$mainText = substr($mainFact, 0, $onePar);
?>	
		<ul id="primaryNav" class="col4">
			<li id="home"><a href="javascript:defineAttribute('<?php echo $mainFact; ?>','1')"><?php echo $mainText; ?></a></li>
<?php

//var_dump($array);

        if($array==null){
                return null;
        }
        foreach ($array as $i => $value) {
//		echo $value["id"].','.$value["verb"].','.$value["array"].'<br/>';
		printNode($value["id"],$value["array"]);
        }
/*        	$array = $_SESSION["dkt_arrayvalue"];
        	var_dump($array);
		printNode($array[$mainFact]);
*/
?>	
		</ul>
<?php
	}
?>	
