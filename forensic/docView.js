function prepareDocsView( jsonResult ) {
	var resultData = JSON.parse(jsonResult);
//	alert("--OBJECT:"+obj);
/*	document.getElementById("main-content-content").innerHTML = 
		"<div class=\"col-md-3\" style=\"width:25%;margin:0px;border-width:2px;border-style: solid;\">" + 
		"	<h4 class=\"pull-right\"><i class=\"fa fa-plus-square-o\"></i></h4>" + 
		"	<h4><a href=\"newCollection.php\">Add New Document</a></h4>" + 
		"	<p>In order to create / add a new document click at <a href=\"newDocument.php\">Create New Document</a>.</p>" + 
		"</div>";*/
	var innerText = "";
	for (var key in resultData.documents){
		innerText += 
		//"<div class=\"col-md-3\" style=\"width:25%;margin:0px;border-width:2px;border-style: solid;\">" + 
		"<div class=\"col-lg-3 col-md-4 col-sm-6\" style=\"margin:0px;border-width:2px;border-style: solid;\">" + 
		"	<div class=\"caption\">" + 
		"   	 <h4><a href=\"documentDetail.php?documentId="+resultData.documents[key].documentId+"&documentName="+resultData.documents[key].documentName+"\">" + resultData.documents[key].documentName + "</a></h4>" + 
		"   	 <p><a href=\"documentDetail.php?documentId="+resultData.documents[key].documentId+"&documentName="+resultData.documents[key].documentName+"\">See docujment details</a></p>" + 
		"	<p><a href=\"documentDetail.php\">See document details</a></p>" + 
		"	</div>" + 
		"	<div class=\"row\">" + 
		"<div class=\"ratings\">" + 
		"   	 <p class=\"pull-right\" style=\"margin-right:20px;\"> <?php echo $notpro; ?><i class=\"fa fa-exclamation-triangle\"></i></p>" + 
		"   	 <p class=\"pull-right\" style=\"margin-right:20px;\"> <?php echo $currently; ?><i class=\"fa fa-gears fa-hourglass-half\"></i></p>" + 
		"   	 <p class=\"pull-right\" style=\"margin-right:20px;\"> <?php echo $error; ?><i class=\"fa fa-times\"></i></p>" + 
		"   	 <p class=\"pull-right\" style=\"margin-right:20px;\"> <?php echo $processed; ?><i class=\"fa fa-check\"></i></p>" + 
		"	</div>" + 
		"</div>" + 
		"<div class=\"row\">" + 
		"	<div class=\"ratings\">" + 
		"	<p class=\"pull-right\" style=\"margin-right:20px;\"> <i class=\"fa fa-exclamation-triangle\"></i></p>" + 
		"	<p class=\"pull-right\" style=\"margin-right:20px;\"> <i class=\"fa fa-gears fa-hourglass-half\"></i></p>" + 
		"	<p class=\"pull-right\" style=\"margin-right:20px;\"> <i class=\"fa fa-times\"></i></p>" + 
		"<p class=\"pull-right\" style=\"margin-right:20px;\"> <i class=\"fa fa-check\"></i></p>" + 
		"</div>" + 
		"	</div>" + 
		"</div>";
	}
	document.getElementById("main-content-content").innerHTML += innerText;
}

