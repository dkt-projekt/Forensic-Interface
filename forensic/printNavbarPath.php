<?php

function printNavbarPath($siteN){
        echo '<div class="nav navbar-path navbar-nav">';

	if($siteN=='index'){
		echo '<a class="nav-item nav-link active" href="index.php">Forensic</a>';
	}
	else if($siteN=='collections'){
		echo '<a class="nav-item nav-link active" href="index.php">Forensic/</a>';
		echo '<a class="nav-item nav-link active" href="collections.php">Collections</a>';
	}
	else if($siteN=='newcollection'){
		echo '<a class="nav-item nav-link active" href="index.php">Forensic/</a> ';
		echo '<a class="nav-item nav-link active" href="collections.php">Collections/</a> ';
		echo '<a class="nav-item nav-link active" href="newCollection.php">Generate New Collection</a>';
	}
	else if($siteN==''){
		echo '<a class="nav-item nav-link active" href="index.php">Forensic/</a>';
		echo '<a class="nav-item nav-link active" href=""></a>';
	}
        echo '</div>';
}

?>
