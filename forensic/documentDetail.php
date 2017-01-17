<?php
        $siteName = 'collections';
        $siteTitle = 'Collections - Information Forensics';
        require_once('lib2.php');

//	$user = getSession("forensicUser","");

	$collectionId = getForm("collection");
	if(empty($collectionId)){
		$collectionId = getSession('forensicCollectionId','');
	}
	
	$documentId = getForm('documentId','');
	$documentName = getForm('documentName','');

	require_once("head.php");

?>
<body>
<div id="test"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">

    var collectionName = '<?php echo $collectionId;?>';
    
    SemanticStoryTelling = {
		init: function(selector){
			var that = this;
			selector.find("span.label-success, span.label-warning, span.label-info")
				.addClass("pointer").click(function(){
				that.loadAuthorities($(this));
			});
		},

		loadAuthorities: function(annotation){
			var label = annotation.html();
			labelEncoded = encodeURIComponent(label);
			var url = "https://dev.digitale-kuratierung.de/api/data-backend/" + 
				collectionName + "/authorities/api/load-authorities?text=" + labelEncoded;
			var that = this;
			$.get(url, function(data){
				that.showAuthoritiesDialog(label, data);
			});
		},

		showAuthoritiesDialog: function(label, data){
			console.log(data);
			var div = $("<div>").addClass("hub").appendTo($("body"));
			var ul = $("<ul>").appendTo(div);
			for( var i=0; i<data.length; i++ ){
				var li = $("<li>").appendTo(ul);
				var link = data[i];
				var text = link.doc + " (" + link.count + " occurences)";
				var url = "https://dev.digitale-kuratierung.de/Forensic-Interface/forensic/documentDetail.php?documentId=" 
					+ encodeURIComponent(link.doc);
					+ "&collection=" + collectionName;
				$("<a>").attr("href", url).html(text).appendTo(li);
			}
			div.dialog({
				title: "Hub for " + label,
				width: 500
			});
		}
    }

    
      $(document).ready(function() {
                $('body').addClass("loading");
                var userId = '<?php echo $userId;?>';
                var documentId = '<?php echo $documentId;?>';
                var documentName = '<?php echo $documentName;?>';
//alert('https://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/documents?documentName='+encodeURIComponent(documentId));
                var posting = $.get( 'https://dev.digitale-kuratierung.de/api/data-backend/'+collectionName+'/documents?documentName='+encodeURIComponent(documentId), { user: userId, highlightedContent: true } );
//                alert( 'https://dev.digitale-kuratierung.de/api/e-parrot/'+collectionName+'/'+documentName+'/overview' );
                posting.done(function( data ) {
//			alert(data);
		        var resultData = JSON.parse(data);
					var text = resultData.highcontent;
					text = text.replace( new RegExp("\\r\\n", 'g'), "<br/>\r\n");
					$('#high-content').html(text+"                                        <div class=\"col-lg-12 col-md-12\"><span class=\"label label-default\">Other</span><span></span><span class=\"label label-primary\">Temporal Expresions</span><span></span><span class=\"label label-success\">Person</span><span></span><span class=\"label label-info\">Organisation</span><span></span><span class=\"label label-warning\">Location</span><span></span><!--<span class=\"label label-danger\">Danger Label</span>--></div>");
                        $('#nif-content').html("<xmp>"+resultData.nifcontent+"</xmp>");
                        //alert("<pre>"+resultData.nifcontent+"</pre>");
                        $('body').removeClass("loading");

                    SemanticStoryTelling.init($("#high-content"));
                });
                posting.fail(function(xhr,status,error){
                        alert(status);
                        $('body').removeClass("loading");
                });

        /*var url = 'https://dev.digitale-kuratierung.de/forensic/';

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

        $('#main-content').load('https://dev.digitale-kuratierung.de/Forensic-Interface/forensic/documentHighContent.html');
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
    <div class="col-lg-12 col-md-12 col-sm-12" style="background-color:#727173;color:#81BEF7;">
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
<!--              <li>  <a href="javascript:void(0)" id="documentHighContent">Highlight</a></li>
              <li><a href="javascript:void(0)" id="documentNifContent">NIF Content</a></li>-->
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
    		<div class="col-lg-6 col-md-6 col-sm-12" id="high-content">
    		</div>
    		<div class="col-lg-6 col-md-6 col-sm-12" id="nif-content">
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

</div>
</div>
<?php
	require_once("footer.php");
?>
</body>
</html> 

