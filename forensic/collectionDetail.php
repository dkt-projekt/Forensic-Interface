<?php
	$siteName = 'collections';
	$siteTitle = 'Collection Details - Information Forensics';
	require_once('lib2.php');

//	$userId = getSession('forensicUser','');
//      $user = getSession("forensicUser","");
	$collectionId = getForm('collectionId','');
	if($collectionId!=''){
		setSession('forensicCollectionId',$collectionId);
	}
	else{
		$collectionId = getSession('forensicCollectionId','');
	}
	if($collectionId==''){
		header('location: collections.php');
		exit(0);
	}
	require_once("head.php");
?>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="docView.js"></script>
<script src="serviceCalls.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	var url = 'http://dev.digitale-kuratierung.de/forin/forensic/';

        $('#collectionMenuList li a').click(function(e) { 
                e.preventDefault();
                var href = url + $(this).attr('id') + '.html ';
                var collectionName = '<?php echo $collectionId;?>';
                var userId = '<?php echo $userId;?>';
                var content = '';
                var urlPath = '';
                $('#main-content').empty(); 
                $('#main-content').load(href);
                $('body').addClass("loading");
		callListDocuments($(this).attr('id'),collectionName,userId);
//              alert('success');
//                $('body').removeClass("loading");
        });

//	document.getElementById('dashboard').click();
	$('#main-content').load('http://dev.digitale-kuratierung.de/forin/forensic/dashboard.html');
});
</script>



<div id="m" class="containerr-fluid">
<?php
	require_once("sidebar.php");
?>
<div id="main" class="containerr">
<?php
	$navbarPath='collectionDetails';
	require_once("header.php");
?>

<div class="row colNav" style="width:100%;margin:0">
	<div class="col-lg-12 col-md-12 col-sm-12" style="width:100%;margin:0px;background-color:#727173;color:#81BEF7;">
		<div class="row colNav">
			<div class="pull-right">
				<a href="collectionConfiguration.php" id="configurationButton"><i class="fa fa-gears fa-3x" style="font-size:30px;cursor:pointer;color:#81BEF7"></i></a>
			</div>
			<div class="pull-left">
				<a href="collections.php"><i class="fa fa-arrow-left fa-3x" style="font-size:30px;cursor:pointer;color:#81BEF7;"></i></a>
			</div>
			<div class="col-lg-11 col-md-11 col-sm-11">
				<div class="row colNav">
					<div class="col-lg-1 col-md-1 col-sm-1">
						<span><?php echo $collectionId;?></span>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 collectionMenu">
						<ul id="collectionMenuList" class="collectionMenuList">
							<li><a href="javascript:void(0)" id="dashboard">Dashboard</a></li>
							<li><a href="javascript:void(0)" id="clustering">Clustering</a></li>
							<li><a href="javascript:void(0)" id="listdocuments">Documents</a></li>
							<li><a href="javascript:void(0)" id="map">Map</a></li>
							<li><a href="javascript:void(0)" id="timeline">Timeline</a></li>
<!--							<li><a href="javascript:void(0)" id="semanticexploration">Semantic Exploration</a></li>-->
							<li><a href="javascript:void(0)" id="autoglossary">Autoglossary</a></li>
							<li><a href="javascript:void(0)" id="stats">Statistics</a></li>
							<li><a href="javascript:void(0)" id="authorities">Authorities</a></li>
						</ul>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2">
						<form class="navbar-form" role="search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search" name="q" style="background-color:#FFFFFF;color:black;"/>
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row" style="width:100%;margin:0;">
	<div id="configuration-menu" class="col-lg-2 col-md-2 col-sm-2" style="padding:10px;float:right;text-align:center;background-color:#0B3861;visibility:hidden;">
                                <a href="newDocument.php" class="btn btn-success">Add Document</a>
                                <a href="configurationCollection.php" class="btn btn-warning">Edit Collection</a>
                                <a href="deleteCollection.php?collectionId=<?php echo $collectionId; ?>" class="btn btn-danger">Delete Collection</a>		
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12" id="main-content" style="margin:0;padding:0px;">
	</div>
</div>
<div class="modal"><!-- Place at bottom of page --></div>
</div>
</div>
<script>

document.getElementById("configurationButton").addEventListener("click", function(event){
    event.preventDefault();
        if(document.getElementById("configuration-menu").style.visibility=='hidden'){
                document.getElementById("configuration-menu").style.visibility = 'visible';
        }
        else{
                document.getElementById("configuration-menu").style.visibility = 'hidden';
        }

});

/*function openMenu() {
	if(document.getElementById("configuration-menu").style.visibility=='hidden'){
    		document.getElementById("configuration-menu").style.visibility = 'visible';
	}
	else{
    		document.getElementById("configuration-menu").style.visibility = 'hidden';
	}
}*/
</script>

<?php
	require_once("footer.php");
?>
</body>
</html> 

