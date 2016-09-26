<?php
        $siteTitle = 'Sign in site !!! - Information Forensics';
        require_once('lib2.php');
        $user = getSession('forensicUser','');
        if($user!=''){
                header('location: index.php');
                exit(0);
        }

        $email = getForm('email','');
        $password = getForm('password','');

        if($email=='' && $password==''){

        }
        else if($email=='' || $password==''){
                $errorMessage = "Empty Data are provided!!";
        }
        else{
                if(checkUser($email,$password)){
                        setSession('forensicUser',$email);
                        header('location: index.php');
                }
                else{
                        $errorMessage = "Incorrect user or password!!";
                }
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


      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                        <h3 class="panel-title">Please Sign In</h3>
                        <form role="form" action="signin.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="forgot.php" class="">Forgot password?</a>
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                            </fieldset>
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
