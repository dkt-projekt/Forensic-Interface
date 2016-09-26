<?php
        $siteTitle = 'Sign in site !!! - Information Forensics';
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
        if($errorMessage!=''){
                echo '<div class="alert alert-danger">';
                echo '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                echo '  <strong>Error!</strong> '.$errorMessage;
                echo '</div>';
        }
?>

            <div class="row">
                <div class="col-lg-12">
                </div>
            </div>
<?php
        $data = array(
                'accessKey' => 'dkt2015$',
                'user' => $user
        );
      $result = CallAPI2("GET", "http://dev.digitale-kuratierung.de/api/e-parrot/getUserInformation", $data);
        $json = json_decode($result);

//var_dump($json);

        $userId = $json->id;
        $userLogin = $json->email;
        $userPassword = $json->password;
        $userName = $json->userName;

?>


        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                    <h2 class="panel-titl">User Profile</h2>
        <form action="modifyuser.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-gears fa-fw"></i> User Information
                        </div>
                        <div class="panel-body">
                                <div class="col-lg-12 col-md-6">
                                        <div class="row">
                                                <div class="form-group">
                                                    <label>Login</label>
                                                    <input class="form-control" name="email" value="<?= $user;?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Complete Name</label>
                                                    <input class="form-control" name="userName" value="<?= $userName;?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Modify Password</label>
                                                    <input class="form-control" name="password" placeholder="Enter new password">
                                                    <input class="form-control" name="password2" placeholder="Repeat new password">
                                                </div>
                                        </div>
                                </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-pencil-square-o fa-fw"></i> Actions
                        </div>
                        <div class="panel-body">
                                <div class="col-lg-12 col-md-6">
                                        <div class="row">
                                                <button type="submit" class="btn btn-success">Modify User</button>
                                                <button type="reset" class="btn btn-warning">Reset Form</button>
                                                <a href="index.php" type="cancel" class="btn btn-danger">Cancel</a>
                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

            </div>
        </div>

</div>
</div>

<?php
        require_once("footer.php");
?>
</body>
</html>
