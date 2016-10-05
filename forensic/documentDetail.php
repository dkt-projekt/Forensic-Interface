<?php
        $siteName = 'collections';
        $siteTitle = 'Collections - Information Forensics';
        require_once('lib2.php');

//	$user = getSession("forensicUser","");
	$collectionId = getSession('forensicCollectionId','');
	$documentId = getForm('documentId','');
	$documentName = getForm('documentName','');

	require_once("head.php");

?>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
                $('body').addClass("loading");
                var collectionName = '<?php echo $collectionId;?>';
                var userId = '<?php echo $userId;?>';
                var documentId = '<?php echo $documentId;?>';
                var documentName = '<?php echo $documentName;?>';
                var posting = $.post( 'http://dev.digitale-kuratierung.de/api/e-parrot/'+collectionName+'/'+documentName+'/overview', { user: userId } );
//                alert( 'http://dev.digitale-kuratierung.de/api/e-parrot/'+collectionName+'/'+documentName+'/overview' );
                posting.done(function( data ) {
			//alert(data);
		        var resultData = JSON.parse(data);
                        $('#high-content').html(resultData.highlightedContent+"                                        <div class=\"col-lg-12 col-md-12\"><span class=\"label label-default\">Other</span><span></span><span class=\"label label-primary\">Temporal Expresions</span><span></span><span class=\"label label-success\">Person</span><span></span><span class=\"label label-info\">Organisation</span><span></span><span class=\"label label-warning\">Location</span><span></span><!--<span class=\"label label-danger\">Danger Label</span>--></div>");
                        $('#nif-content').html("<xmp>"+resultData.annotatedContent+"</xmp>");
                        alert("<pre>"+resultData.annotatedContent+"</pre>");
                        $('body').removeClass("loading");
                });
                posting.fail(function(xhr,status,error){
                        alert(status);
                        $('body').removeClass("loading");
                });

        /*var url = 'http://dev.digitale-kuratierung.de/forensic/';

	$('#documentMenuList a').click(function(e) { // Al hace click sobre un enlace dentro del menú
                $('body').addClass("loading");
                e.preventDefault();
                var href = url + $(this).attr('id') + '.html ';
                callDocumentDetails($(this).attr('id'),collectionName,userId,documentId);
//              alert('success');
                $('#main-content').empty(); 
                $('#main-content').load(href);
//                $('body').removeClass("loading");
	});

        $('#main-content').load('http://dev.digitale-kuratierung.de/forin/forensic/documentHighContent.html');
*/
      });    
    </script>
<div id="m" class="containerr-fluid">
<?php
require_once("sidebar.php");
?>

<div id="main" class="containerr" style="width=100%;margin:0;">
<?php
require_once("header.php");
?>

  <div class="row" style="margin:0;">
    <div class="col-lg-12 col-md-12 col-sm-12" style="background-color:#0B3861;color:#81BEF7;">
  <div class="row">
      <div class="pull-right" id="documentMenuList">
        <a href="documentConfiguration.php" id="documentConfiguration"><i class="fa fa-gears fa-3x" style="font-size:30px;cursor:pointer;color:#81BEF7"></i></a>
      </div>
      <div class="pull-left">
        <a href="collectionDetail.php?collectionId=<?php echo $collectionId;?>"><i class="fa fa-arrow-left fa-3x" style="font-size:30px;cursor:pointer;color:#81BEF7;"></i></a>
      </div>
      <div class="col-lg-10 col-md-10 col-sm-10">
	<div class="row">
          <div class="col-lg-2 col-md-2 col-sm-2">
            <span><?php echo $documentName; ?></span>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 collectionMenu">
            <ul id="documentMenuList" class="collectionMenuList">
              <li>  <a href="javascript:void(0)" id="documentHighContent">Highlight</a></li>
              <li><a href="javascript:void(0)" id="documentNifContent">NIF Content</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2">
          </div>
        </div>
      </div>
  </div>
    </div>
  </div>
  <div class="row" style="margin:0;">
    <div class="col-lg-12 col-md-12 col-sm-12" id="main-content" style="margin:0;padding:0px;">
    	<div class="row" style="margin:0;">
    		<div class="col-lg-6 col-md-6 col-sm-12" id="high-content" style="margin:0;padding:0px;">
    		</div>
    		<div class="col-lg-6 col-md-6 col-sm-12" id="nif-content" style="margin:0;padding:0px;">
    		</div>
    	</div>
    </div>
  </div>
</div>
</div>
<?php
	require_once("footer.php");
?>
</body>
</html> 

