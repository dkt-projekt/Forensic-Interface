<?php
        $siteTitle = 'New Collection Generation - Information Forensics';
        require_once('lib2.php');
        $user = getSession('forensicUser','');
        if($user==''){
                header('location: index.php');
                exit(0);
        }

	require_once("head.php");
?>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



<div id="m" class="container-fluid">
<?php
	require_once("sidebar.php");
?>

<div id="main" class="containerr">

<?php
	require_once("header.php");
?>

<?php
        $message = getForm('message','');
        if($message!=''){
                echo '<div class="alert alert-success">';
                echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                echo '  <strong>Success!</strong> '.$message;
                echo '</div>';
        }
        $errormessage = getForm('errormessage','');
        if($errormessage!=''){
                echo '<div class="alert alert-danger">';
                echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                echo '  <strong>Error!</strong> '.$errormessage;
                echo '</div>';
        }
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
            <span>{{collectionNameText}}</span>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 collectionMenu">
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2">
            <span></span>
          </div>
        </div>
      </div>
  </div>
    </div>
  </div>
  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Generate a New Collection</h2>
                </div>
            </div>
        <form id="upload" action="generateCollection.php" method="post" enctype="multipart/form-data">
            <div class="row" style="color:white;">
                <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                            <div class="form-group">
                                                    <label>Name</label>
                                                    <input class="form-control" placeholder="Enter a name for the collection" name="collectionName" id="collectionName" value="Collection_Name" ng-model="collectionNameText" ng-init="collectionNameText = 'Collection_Name'">
                                            </div>
                                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12" style="border-style:solid;border-width:1px 0px 0px 0px;border-color:white;padding-top:10px">
                                        <div class="row">
<?php
        require_once('analysis.php');
?>
                                        </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12" style="border-style:solid;border-width:1px 0px 0px 0px;border-color:white;padding-top:10px">
                                        <div class="row">
                                                                <!--<div class="form-group" id="groupFormat">
                                                                    <label>Content Format</label>
                                                                    <select class="form-control" name="format">
                                                                        <option value="text">PLAINTEXT</option>
                                                                        <option value="rdf">RDF</option>
                                                                        <option value="turtle">TURTLE</option>
                                                                        <option value="json">JSON</option>
                                                                    </select>
                                                                </div>-->
<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />
<div>
	<label for="fileselect">Files to upload:</label>
	<input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
	<div id="filedrag">or drop files here</div>
</div>
<div id="fileNames" hidden></div>
<div id="messages">
<p>Status Messages</p>
</div>
<div id="submitbutton">
	<button type="submit">Upload Files</button>
</div>
<p>Upload progress: <progress id="uploadprogress" min="0" max="100" value="0">0</progress></p>
                                        </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12" style="border-style:solid;border-width:1px 0px 0px 0px;border-color:white;padding-top:10px">
                                        <div class="row">
                                                <button type="submit" class="btn btn-success">Create Collection</button>
                                                <button type="reset" class="btn btn-warning">Reset Form</button>
                                                <a href="collections.php" class="btn btn-danger">Cancel</a>
                                        </div>
                </div>

</div>
</div>

<script>
/* attach a submit handler to the form */
$("#upload").submit(function(event) {
	/* stop form from submitting normally */
	event.preventDefault();

	/* get the action attribute from the <form action=""> element */
	var $form = $( this ),
	url = $form.attr( 'action' );

	/* Send the data using post with element id name and name2*/
	var posting = $.post( url, { collectionName: $('#collectionName').val(), files: $('#fileNames').html() } );

	/* Alerts the results */
	posting.done(function( data ) {
		alert(data);
//		window.location.assign("collectionDetail.php?collectionId="+$('#collectionName').val());
	});
	posting.fail(function(xhr,status,error){
		alert(status);
		//alert(error);
	});
});

// getElementById
function $id(id) {
        return document.getElementById(id);
}

//
// output information
function Output(msg) {
        var m = $id("messages");
        m.innerHTML = msg + m.innerHTML;
}

function AddOutputFile(msg) {
        var m = $id("fileNames");
        m.innerHTML = msg + "," + m.innerHTML;
}


// call initialization file
if (window.File && window.FileList && window.FileReader) {
        Init();
}

//
// initialize
function Init() {
        var fileselect = document.getElementById("fileselect"),
                filedrag = $id("filedrag"),
                submitbutton = $id("submitbutton");

        // file select
        fileselect.addEventListener("change", FileSelectHandler, false);

        // is XHR2 available?
        var xhr = new XMLHttpRequest();
        if (xhr.upload) {
        
                // file drop
                filedrag.addEventListener("dragover", FileDragHover, false);
                filedrag.addEventListener("dragleave", FileDragHover, false);
                filedrag.addEventListener("drop", FileSelectHandler, false);
                filedrag.style.display = "block";
                
                // remove submit button
                submitbutton.style.display = "none";
        }

}

// file drag hover
function FileDragHover(e) {
	e.stopPropagation();
	e.preventDefault();
	e.target.className = (e.type == "dragover" ? "hover" : "");
}


var holder = document.getElementById('holder'),
    tests = {
      filereader: typeof FileReader != 'undefined',
      dnd: 'draggable' in document.createElement('span'),
      formdata: !!window.FormData,
      progress: "upload" in new XMLHttpRequest
    }, 
    progress = document.getElementById('uploadprogress'),
    fileupload = document.getElementById('upload');

// file selection
function FileSelectHandler(e) {
	// cancel event and hover styling
	FileDragHover(e);
	// fetch FileList object
	var files = e.target.files || e.dataTransfer.files;
	if (tests.formdata) {
		//var formData = tests.formdata ? new FormData() : null;
		for (var i = 0; i < files.length; i++) {
			var formData = new FormData();
			formData.append('file', files[i]);
			var xhr = new XMLHttpRequest();
			xhr.open('POST', 'uploadFile.php', false);
			xhr.onload = function() {
				progress.value = progress.innerHTML = 100;
			};
	
			if (tests.progress) {
				xhr.upload.onprogress = function (event) {
					if (event.lengthComputable) {
						var complete = (event.loaded / event.total * 100 | 0);
						progress.value = progress.innerHTML = complete;
					}
				}
			}

			xhr.send(formData);
			var resText = xhr.responseText;
//			alert("RESTEXT: "+resText);
			//alert(resText.indexOf("ERROR"));
			if(resText.indexOf("ERROR")==-1){
			//	alert(xhr.responseText);
//				$("#textForFormat").html("Format for file "+resText);
//				div_show();
				var format = prompt("What is the format of the file ["+resText+"]?\n The possible values are: text/turtle/rdf/zip","text");
				if(format!="text" && format!="turtle" && format!="rdf" && format!="zip"){
					alert("Unsupported format: the file will not be uploaded.");
				}
				else{
					ParseFile(files[i]);
					AddOutputFile(xhr.responseText+"#"+format);
				}
			}
			else{
				alert(xhr.responseText);
			}
		}
	}
}

function ParseFile(file) {

	Output(
		"<p>File information: <strong>" + file.name +
		"</strong> type: <strong>" + file.type +
		"</strong> size: <strong>" + file.size +
		"</strong> bytes</p>"
	);
	
}



</script>

<?php
        require_once("footer.php");
?>
</body>
</html>
