<?php
        $siteTitle = 'Sign up site !!! - Information Forensics';
        require_once('lib2.php');
        $user = getSession('forensicUser','');
        if($user!=''){
                header('location: index.php');
                exit(0);
        }

        $email = getForm('email','');
        $password = getForm('password','');
        $password2 = getForm('password2','');
        $name = getForm('name','');

        if($email=='' && $password==''){

        }
        else if($email=='' || existUser($email)=="true"){
                $errorMessage = 'Email is empty or is already in use.';
        }
        else if($password=='' || $password2=='' || $password!=$password2){
                $errorMessage = 'Passwords are different or empty.';
        }
        else{
                $res = registerUser($email,$password,$password2,$name);
//              echo $res;
//exit(0);
                if(strpos(registerUser($email,$password,$password2,$name),'ERROR')===false){
                        header('location: signin.php?message=The user has been correctly created. Please sign in!!');
                        exit(0);
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

                        <form role="form" action="signup.php" method="post" >
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Repeat Password" name="password2" type="password" value="" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Complete Name" name="name" type="text" required>
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Create Account</button>
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
