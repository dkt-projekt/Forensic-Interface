<?php
        $siteName = 'collections';
        $siteTitle = 'Collections - Information Forensics';
        require_once('lib2.php');
	require_once("head.php");


?>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {

        var url = 'http://dev.digitale-kuratierung.de/forensic/';

	$('#documentMenuList a').click(function(e) { // Al hace click sobre un enlace dentro del menú
		e.preventDefault(); // Previene la acción por defecto, que sería enviarte a otra página
		var href = url + $(this).attr('id') + '.html '; // Esta línea extrae el contenido del atributo href del enlace clickeado
                // La línea anterior quedaría así si se clickea en inicio:
                // href = http://misitio.algo/contenido.html #inicio
                // Lo que cargará el contenido del div inicio dentro del contenido.
		$('#main-content').empty(); // Limpia el div 'contenido'
		$('#main-content').load(href); // Esta línea simplemente carga el contenido dentro del div 'contenido'
/*		if($(this).attr('id')=='dashboard'){
		  //$('#main-content').append('<div>Juli GOT IT WORKING</div>');
		  $('#main-content').load(href); // Esta línea simplemente carga el contenido dentro del div 'contenido'
		}
		else{
		  $('#main-content').append('<div>Juli EMPTY</div>');
		}
		//$('#main-content').load(href); // Esta línea simplemente carga el contenido dentro del div 'contenido'
*/	});
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
      <div class="pull-right" id="documentMenuList">
        <a href="documentConfiguration.php" id="documentConfiguration"><i class="fa fa-gears fa-3x" style="font-size:30px;cursor:pointer;color:#81BEF7"></i></a>
      </div>
      <div class="pull-left">
        <a href="collections.php"><i class="fa fa-arrow-left fa-3x" style="font-size:30px;cursor:pointer;color:#81BEF7;"></i></a>
      </div>
      <div class="col-lg-10 col-md-10 col-sm-10">
	<div class="row">
          <div class="col-lg-2 col-md-2 col-sm-2">
            <span>Document Name</span>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 collectionMenu">
            <ul id="documentMenuList" class="collectionMenuList">
              <li>  <a href="javascript:void(0)" id="documentHighContent">Highlight</a></li>
              <li><a href="javascript:void(0)" id="documentNifContent">NIF Content</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2">
            <span>Other information</span>
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
</div>
</div>
<?php
	require_once("footer.php");
?>
</body>
</html> 

