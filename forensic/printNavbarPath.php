<?php

function printNavbarPath($siteN,$collectionId){
        echo '<div class="nav navbar-path navbar-nav" style="color:blue;">';

	if($siteN=='index'){
		echo '<a class="nav-item nav-link active" href="index.php">Forensic</a>';
	}
	else if($siteN=='collections'){
		echo '<a class="nav-item nav-link" href="index.php">Forensic</a>';
		echo '<span>  /  </span>';
		echo '<a class="nav-item nav-link active" href="collections.php">Collections</a>';
	}
	else if($siteN=='newcollection'){
		echo '<a class="nav-item nav-link" href="index.php">Forensic</a> ';
		echo '<span>  /  </span>';
		echo '<a class="nav-item nav-link" href="collections.php">Collections</a> ';
		echo '<span>  /  </span>';
		echo '<a class="nav-item nav-link active" href="newCollection.php">Generate New Collection</a>';
	}
	else if($siteN=='collectionDetails'){
		echo '<a class="nav-item nav-link" href="index.php">Forensic</a>';
		echo '<span>  /  </span>';
		echo '<a class="nav-item nav-link" href="collections.php">Collections</a> ';
		echo '<span>  /  </span>';
		echo '<a class="nav-item nav-link active" href="collectionDetail.php?collectionId='.$collectionId.'">Collection Details</a>';
	}
        echo '</div>';
}

?>
