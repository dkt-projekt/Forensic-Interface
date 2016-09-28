<?php
	$siteName = 'collections';
	$siteTitle = 'Collections - Information Forensics';
	require_once('lib2.php');

	$userId = getSession('forensicUser','');
        $user = getSession("forensicUser","");
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
                $('body').addClass("loading");
                e.preventDefault();
                var href = url + $(this).attr('id') + '.html ';
                var collectionName = '<?php echo $collectionId;?>';
                var userId = '<?php echo $userId;?>';
                var content = '';
                var urlPath = '';
		callListDocuments($(this).attr('id'),collectionName,userId);
//              alert('success');
                $('#main-content').empty(); 
                $('#main-content').load(href);
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
	require_once("header.php");
?>

<div class="row" style="width:100%;margin:0">
	<div class="col-lg-12 col-md-12 col-sm-12" style="width:100%;margin:0px;background-color:#0B3861;color:#81BEF7;">
		<div class="row">
			<div class="pull-right">
				<a href="collectionConfiguration.php"><i class="fa fa-gears fa-3x" style="font-size:30px;cursor:pointer;color:#81BEF7"></i></a>
			</div>
			<div class="pull-left">
				<a href="collections.php"><i class="fa fa-arrow-left fa-3x" style="font-size:30px;cursor:pointer;color:#81BEF7;"></i></a>
			</div>
			<div class="col-lg-10 col-md-10 col-sm-10">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-2">
						<span><?php echo $collectionId;?></span>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 collectionMenu">
						<ul id="collectionMenuList" class="collectionMenuList">
							<li><a href="javascript:void(0)" id="dashboard">Dashboard</a></li>
							<li><a href="javascript:void(0)" id="clustering">Clustering</a></li>
							<li><a href="javascript:void(0)" id="documents">Documents</a></li>
							<li><a href="javascript:void(0)" id="map">Map</a></li>
							<li><a href="javascript:void(0)" id="timeline">Timeline</a></li>
							<li><a href="javascript:void(0)" id="semanticexploration">Semantic Exploration</a></li>
						</ul>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2">
						<form class="navbar-form" role="search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search" name="q" style="background-color:#81BEF7;color:black;"/>
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
	<div class="col-lg-12 col-md-12 col-sm-12" id="main-content" style="margin:0;padding:0px;">
	</div>
</div>
<div class="modal"><!-- Place at bottom of page --></div>
</div>
</div>
<?php
	require_once("footer.php");
?>
</body>
</html> 

