<?php

?>
        <div class="navbar">
            <div class="navbar-header">
      		<span class="navbar-brand" style="font-size:30px;cursor:pointer;color:white;" onclick="openNav()">&#9776;</span>
                <a class="navbar-brand" href="index.php"><img src="images/DKT_logo_final.svg" alt="Forensics" style="max-height:90px;"/></a>
                <div class="navbar-wordbrand">Digitale Kuratierungs Technologien</div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <ul class="nav navbar-top-links navbar-right">
<?php
	printNavbarPath($navbarPath,$collectionId);
?>
                <!--<li class="dropdown">
                    <a class="dropdown-toggle" href="index.php">
                        <i class="fa fa-home fa-fw"></i>
                    </a>
                </li>-->
<?php
/*        if($user==''){
                   echo '<li><a href="signin.php"><i class="fa fa-user fa-fw"></i> Sign in</a></li>';
                   echo '<li class="divider"></li>';
                   echo '<li><a href="signup.php"><i class="fa fa-sign-out fa-fw"></i> Sign up</a></li>';
        }
        else{
                   echo '<li> '.$user.'</li>';
                   echo '<li><a href="profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a></li>';
                   echo '<li class="divider"></li>';
                   echo '<li><a href="signout.php"><i class="fa fa-sign-out fa-fw"></i> Sign out</a></li>';
        }*/
?>
            </ul>
        </div>
