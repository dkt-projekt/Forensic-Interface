<?php
	$siteName = 'index';
        $siteTitle = 'Home - Information Forensics';
        require_once('lib2.php');
//        $user = getSession('forensicUser','');
?>
<?php
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
$navbarPath='index';
require_once("header.php");
?>
                <!--<div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>-->
  <div class="row" style="">
    <!--<div class="col-lg-6 col-md-6 col-sm-12">
      <h2>Forensics</h2>
      <p>This is a platform developed for the forensics of digital information in order to help knowledge workers to make easier their tasks at analysing, studying and exploring huge collections of information in different multimedia formats.</p>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align:center;">-->
    <div class="col-lg-12 col-md-12 col-sm-12" style="min-height:600px;display: flex;justify-content: center;align-items: center;">
    <div class="col-lg-12 col-md-12 col-sm-12" style="text-align:center;position: relative;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);">
      <h2>Forensics</h2>
	<br/>
      <p>This is a platform developed for the forensics of digital information in order to help knowledge workers to make easier their tasks at analysing, studying and exploring huge collections of information in different multimedia formats.</p>
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
