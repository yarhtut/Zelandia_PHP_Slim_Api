<link rel="stylesheet" href="../css/bootstrap_mod.css" />
<link rel="stylesheet" href="../css/Custom/custom.css" />
<link rel="stylesheet" href="../css/Custom/login.css" />
<link rel="stylesheet" href="../fonts/fonts-awesome/css/font-awesome.min.css" />


<?php

require_once ("connect.php");




session_start();


if (isset($_GET) && isset($_GET['logout'])){
    session_destroy();
    header('location: index.php');
    return;
}



if (isset($_SESSION['logged_in']) == false) {

    ?>
    <html>
    <body class="admin-login">
            <div id="loginform">
                <section id="container">

                    <div class="container colored" >
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="container">
                                <div class="col-md-4">
                                    <form class="form-signin" action="admin.php" method="POST">

                                        <span class="backto"><em><a href="index.php">&laquo; back to the site</a></em></span></li>
                                        <h3>LOGIN</h3>
                                        <label for="Username" class="sr-only">UserName </label>
                                        <input type="text" id="username"name="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus"/>
                                        <label for="pwd" class="sr-only">Password</label>
                                        <input type="password"  class="form-control" name="password" id="password" placeholder="Password" required="required" />

                                        <button class="btn btn-sm btn-warning btn-block" value="LOGIN" id="submit" type="submit">Sign in</button>
                                    </form>
                                </div>
                            </div>

                </section>
                </div>
    </div>

    <?php
    //session_destroy()

}

if (isset($_POST) && isset($_POST['username']) && isset($_POST['password'] )) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $SQL = "SELECT * FROM `admin` WHERE user_name = '$username'";

    $admin_results = $db->query($SQL);
    $accounts = $admin_results->num_rows;


    if ($accounts > 0){
        $is_valid = false;
        while($results = $admin_results->fetch_assoc()){
            if($password == $results['password']){
                //user is okay
                $is_valid = true;
                break;
            }
        }
        if ($is_valid == true){
            //echo "Success";
            $_SESSION['logged_in'] = true;
            header('location: admin.php');

        }else{
            echo "Password Incorrect";
        }

    }else{
        echo "'$username' does not exist";
    }
    exit;
}
if (isset($_SESSION['logged_in']) == true) {
?>

    <div class="container-fluid ">

        <nav role="navigation" class="navbar  admin-top-menu">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand pull-left ">Zealandia <p class="pull-right">Sanctuary</p></a>
                </div>
                <!-- Collection of nav links and other content for toggling -->
                <div  class="collapse navbar-collapse">
                    <ul class="nav navbar-nav pull-left">
                        <li class="home-back"><a href="index.php" title="Back to the homepage"><i class="fa fa-home"></i> Back to the Home Page</a></li>

                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <li class="logout pull-right">  <a href="?logout" id="btnLogout" title="logout yar"/><i class="fa fa-sign-out"> Log Out</i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>








<div class="bs-example">
    <!--------------------------------admin left panel ----------------------------->
    <div id="navbarCollapse" class= " col-lg-3 col-md-3 admin-panel-left">
        <ul class="nav nav-pills nav-stacked" id="myTab">
            <li><a data-toggle="tab" href="#sectionA">Section A</a></li>
            <li><a data-toggle="tab" href="#sectionB">Section B</a></li>
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a data-toggle="tab" href="#dropdown1">Dropdown1</a></li>
                    <li><a data-toggle="tab" href="#dropdown2">Dropdown2</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!----------------------------------admin right-------------------------->
    <div class="col-lg-9 col-md-9">
        <div class="tab-content">
            <div id="sectionA" class="tab-pane fade in active">
                <h3>Section A</h3>
                <p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
            </div>
            <div id="sectionB" class="tab-pane fade">
                <h3>Section B</h3>
                <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
            </div>
            <div id="dropdown1" class="tab-pane fade">
                <h3>Dropdown 1</h3>
                <p>WInteger convallis, nulla in sollicitudin placerat, ligula enim auctor lectus, in mollis diam dolor at lorem. Sed bibendum nibh sit amet dictum feugiat. Vivamus arcu sem, cursus a feugiat ut, iaculis at erat. Donec vehicula at ligula vitae venenatis. Sed nunc nulla, vehicula non porttitor in, pharetra et dolor. Fusce nec velit velit. Pellentesque consectetur eros.</p>
            </div>

    </div>

</div>




<?php
}
?>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/custom.js"></script>
<script src="../js/main.js"></script>
</body>



</html>