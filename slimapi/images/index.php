<?php
header("access-control-allow-origin: *");
header('Content-Type: application/json');

error_reporting(E_ALL);
ini_set('display_errors', 1);

//check session exists
if (session_id() == '')
    session_start();

require 'Slim/Slim.php';

global $db;
require 'template/connect.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();


// route to template directroy
$app->config(array(
    'debug' => true,
    'templates.path' => 'template'
));


//main index root
$app->get('/', function () use($app) {

    $app->redirect($app->urlFor('home'));
});

$app->get('/home', function () use($app) {
    $app->render('include/top-menu.php');
    $app->render('include/top_navbar.php');
    $app->render('include/script.php');
    //render main home page
    $app->render('home.php');

})->name("home");

// render the Sanctuary php page
$app->get('/Sanctuary', function () use($app) {

    $app->render('include/top-menu.php');
    $app->render('include/top_navbar.php');
    $app->render('include/script.php');
    //render main home page
    $app->render('Sanctuary.php');


});
$app->get('/education', function () use($app) {

    $app->render('include/top-menu.php');
    $app->render('include/top_navbar.php');
    $app->render('include/script.php');
    //render main home page
    $app->render('education.php');


});
// render the Sanctuary php page
$app->get('/Sanctuary', function () use($app) {

    $app->render('include/top-menu.php');
    $app->render('include/top_navbar.php');
    $app->render('include/script.php');
    //render main home page
    $app->render('Sanctuary.php');


});


//Admin logon Page
$app->group('/admin', function () use ($db,$app) {

    $app->get('', function () use ($app) {

        //render main home page
        $app->render('include/top-menu.php');

        //render the script.php
        $app->render('include/script.php');

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            //render the admin page
           if($_SESSION['user']['account_info']['type_admin'] == 1 ) {
               $app->render('admin.php');
           }
            else{
                $app->render('members.php');
            }
        } else {

            $app->render('login.php');

        }


    })->name("login");

    $app->get('/logout', function () use ($app) {
        $_SESSION['logged_in'] = false;
        unset($_SESSION['logged_in']);

        session_destroy();

        $app->redirect($app->urlFor('login'));
    });

})
    /*------------------------------------API invoke--------------------*/
;$app->group('/api', function () use ($db,$app) {


      //API admin controller

    //------------------------------------------lIST VIEW FOR SANCTUARY
    //define our response back to ajax
    $response['success'] = false;
    $response['data'] = null;

    $app->get('/list/all', function () use($db,$app, $response) {

        $SQL = "SELECT * FROM `listview`";
        $cat_results = $db->query($SQL);


        $success = ($cat_results->num_rows > 0) ? true : false;
        $response['success'] = $success;

        $results = array();

        while($result = $cat_results->fetch_assoc())
            $results[] = $result;


        $response['data'] = $results;

        returnResponse($response);
        //$response['success'] = $success;
        //echo json_encode($results);
    });

    $app->get('/list/:cat', function ($cat) use($db,$app, $response) {

        $SQL = "SELECT * FROM `listview` WHERE `list_cat` = '$cat'";
        $cat_results = $db->query($SQL);


        $success = ($cat_results->num_rows > 0) ? true : false;
        $response['success'] = $success;

        $results = array();

        while($result = $cat_results->fetch_assoc())
            $results[] = $result;


        $response['data'] = $results;

        returnResponse($response);
        //$response['success'] = $success;
		//echo json_encode($results);
    });
    /*
	$app->get('/list/mobile/:cat', function ($cat) use($db,$app, $response) {

        $SQL = "SELECT * FROM `listview` WHERE `list_cat` = '$cat'";
        $cat_results = $db->query($SQL);


        $success = ($cat_results->num_rows > 0) ? true : false;
        $response['success'] = $success;

        $results = array();

        while($result = $cat_results->fetch_assoc())
            $results[] = $result;


        $response['data'] = $results;

        //echo $_GET['callback']."(".json_encode($response).")";
        //$response['success'] = $success;
        //returnResponse($response);
        echo json_encode($response);
    });
    */
    //---------------------------------------------Member json data call from api
    $app->get('/members/:type', function ($cat) use($db,$app, $response) {

        $SQL = "SELECT * FROM `members` WHERE `type_admin` = '0'";
        $type_members = $db->query($SQL);

        $success = ($type_members ->num_rows >0) ?true: false;


        $response['success'] = $success;

        $results = array();

        while($result = $type_members->fetch_assoc())
            $results[] = $result;


        $response['data'] = $results;

        returnResponse($response);
        //$response['success'] = $success;
    });
    //-------------------------------------------------ADMIN ENABLE WHICH IS ACTIVE OR NOT
    $app->get('/list/:cat/1', function ($cat, $active) use($db,$app, $response) {

        if (isset($_POST)&&isset($_POST['id']) && isset($_POST['check'])){

            $id = $_POST['id'];
            $check = $_POST['check'];


            $SQL_UPDATE = "UPDATE `listview` SET `check` = '$check' WHERE `id` = 'id' ";


            $update_listview_active = $db->query($SQL_UPDATE);
            if ($update_listview_active){
                echo "success";
                //header('location: products.php');
                exit;
            }else{
                echo "Update Failed $SQL_UPDATE";
                exit;
            }

        }

    });
    //----------------------------LIST VIEW FOR EDUCATION ONLY SHOW WHICH IS ACTIVE '1' BY ADMIN
    $app->get('/list/:cat/:active', function ($cat, $active) use($db,$app, $response) {
        $active_request = ($active == 'active')? 1 : 0 ;
        $SQL = "SELECT * FROM `listview` WHERE `list_cat` = '$cat' AND `list_active` = '$active_request'";
        $cat_results = $db->query($SQL);


        $success = ($cat_results->num_rows > 0) ? true : false;
        $response['success'] = $success;

        $results = array();

        while($result = $cat_results->fetch_assoc())
            $results[] = $result;


        $response['data'] = $results;

            $response['debug']=$SQL;
        returnResponse($response);
        //$response['success'] = $success;
    });



    //========================================update our list from admin panel
    $app->post('/update/:action', function ($action) use($db,$app, $response) {
        //security check ONLY admin can update
        //CHECK SESSION ACCOUNT
        $response['success'] = false;

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            //render the admin page
            if ($_SESSION['user']['account_info']['type_admin'] == 1) {

                $items = $app->request->post("items");
               // $active = $app->request->post("data");
                $list_id = $app->request->post("list_id");
                $list_name = $app->request->post("list_name");
                $list_cat = $app->request->post("list_cat");
                $list_img = $app->request->post("list_img");
                $list_sound= $app->request->post("list_sound");
                $list_points = $app->request->post("list_points");
                $list_desc = $app->request->post("list_desc");

                //lets update CAT
                //deletes
                //active
                //updates
                if ($action == 'addNew'){
                    // $active = $app->request->post("data");
                    // $IDS = implode(",", $items);

                    $SQL_INSERT = "INSERT INTO `zealandia`.`listview` (`list_name`,`list_cat`, `list_img`, `list_sound`,`list_points`, `list_desc`) VALUES ( '$list_name','$list_cat', '$list_img', '$list_sound','$list_points', '$list_desc');";


                    $add_new = $db->query($SQL_INSERT);
                    if ($add_new){
                        $response['success'] = true;
                        $response['data'] = "Inserted";
                    }else{
                        $response['success'] = false;
                        $response['data'] = "error";
                        //@todo get sql error
                    }

                }
                if ($action == 'delete'){
                    // $active = $app->request->post("data");
                    // $IDS = implode(",", $items);

                    $SQL_DELETE = "DELETE FROM `listview` WHERE `list_id` = '$list_id';";


                    $delete = $db->query($SQL_DELETE);
                    if ($delete){
                        $response['success'] = true;
                        $response['data'] = "deleted";
                    }else{
                        $response['success'] = false;
                        $response['data'] = "error";
                        //@todo get sql error
                    }

                }
                if ($action == 'update'){
                    // $active = $app->request->post("data");
                   // $IDS = implode(",", $items);

                    $SQL_UPDATE = "UPDATE `listview` SET `list_name` = '$list_name', `list_img` = '$list_img' , `list_sound` = '$list_sound', `list_points` = '$list_points' , `list_desc` = '$list_desc' WHERE `list_id` = '$list_id';";


                    $update = $db->query($SQL_UPDATE);
                    if ($update){
                        $response['success'] = true;
                        $response['data'] = "updated";
                    }else{
                        $response['success'] = false;
                        $response['data'] = "error";
                        //@todo get sql error
                    }

                }
                if ($action == 'active'){
                    // $active = $app->request->post("data");
                    $IDS = implode(",", $items);
                    $SQL = "UPDATE  `zealandia`.`listview` SET  `list_active` =  '1' WHERE `list_id` IN($IDS) ";
                    $update = $db->query($SQL);
                    if ($update){
                        $response['success'] = true;
                        $response['data'] = "updated";
                    }else{
                        $response['success'] = false;
                        $response['data'] = "error";
                        //@todo get sql error
                    }

                }
                if($action == 'unactive'){


                    $IDS = implode(",", $items);
                    $SQL = "UPDATE  `zealandia`.`listview` SET  `list_active` =  '0' WHERE `list_id` IN($IDS) ";
                    $update = $db->query($SQL);
                    if ($update){
                        $response['success'] = true;
                        $response['data'] = "updated";
                    }else{
                        $response['success'] = false;
                        $response['data'] = "error";
                        //@todo get sql error
                    }

                }else{
                    $response['data']  = print_r($action,true);
                }

            }else{
                $response['data'] = "You are not an admin account";
            }
        }else{
            $response['data'] = "User not logged in";
        }
        returnResponse($response);
    });


    //======================================update our list from member panel
    $app->post('/memberUpdate/:action', function ($action) use($db,$app, $response) {
        //security check ONLY admin can update
        //CHECK SESSION ACCOUNT
        $response['success'] = false;

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            //render the admin page
            if ($_SESSION['user']['account_info']['type_admin'] == 1) {

                $member_id = $app->request->post("member_id");
                $member_username = $app->request->post("member_username");
                $member_password = $app->request->post("member_password");
                $member_mobile = $app->request->post("member_mobile");

                //lets update MEMBER
                //deletes

                if ($action == 'addNewMember'){

                    $SQL_INSERT = "INSERT INTO `zealandia`.`members` (`user_name`, `pass_word`, `cellnumber`) VALUES ('$member_username', '$member_password', '$member_mobile');";

                    $add_new = $db->query($SQL_INSERT);
                    if ($add_new){
                        $response['success'] = true;
                        $response['data'] = "Inserted";
                    }else{
                        $response['success'] = false;
                        $response['data'] = "error";
                        //@todo get sql error
                    }

                }
                if ($action == 'delete'){
                    // $active = $app->request->post("data");
                    // $IDS = implode(",", $items);
                    $SQL_DELETE = "DELETE FROM `members` WHERE `id` = '$member_id';";


                    $delete = $db->query($SQL_DELETE);
                    if ($delete){
                        $response['success'] = true;
                        $response['data'] = "deleted";
                    }else{
                        $response['success'] = false;
                        $response['data'] = "error";
                        //@todo get sql error
                    }

                }
                if ($action == 'update'){
                    // $active = $app->request->post("data");
                    // $IDS = implode(",", $items);

                    $SQL_UPDATE = "UPDATE `members` SET `user_name` = '$member_username', `pass_word` = '$member_password' , `cellnumber` = '$member_mobile' WHERE `id` = '$member_id';";


                    $update = $db->query($SQL_UPDATE);
                    if ($update){
                        $response['success'] = true;
                        $response['data'] = "updated";
                    }else{
                        $response['success'] = false;
                        $response['data'] = "error";
                        //@todo get sql error
                    }

                }
               else{
                    $response['data']  = print_r($action,true);
                }

            }else{
                $response['data'] = "You are not an admin account";
            }
        }else{
            $response['data'] = "User not logged in";
        }
        returnResponse($response);
    });




    //------------------------------------------------- LOGIN
    $app->post('/login', function () use($db,$app, $response) {
        $username = $app->request->post('username');
        $password = $app->request->post('password');
        //select the user_name from the admin table assign to $SQL
        $SQL = "SELECT * FROM `members` WHERE  user_name = '$username' AND pass_word = '$password' ";


        //this $SQL query to connect the $db connection which is admin_results
        $member_results = $db->query($SQL);

        $success = ($member_results->num_rows > 0) ? true : false;

        $response['success'] = $success;


        if ($success == true) {
            //store the users account details in session
            $_SESSION['user']['account_info'] = $member_results->fetch_assoc();

            $_SESSION['logged_in'] = true;
            $response['data'] = "logged in okay";
            $response['success'] = true;
            //set session user details exist

        }
        else
        {
            unset($_SESSION['logged_in']);
            $response['data'] = "incorrect details";
            $response['success'] = false;
        }



        returnResponse($response);
        //echo $_GET['callback']."(".json_encode($response).")";

    });
    $app->get('/login', function () use($db,$app, $response) {
        $username = $app->request->get('username');
        $password = $app->request->get('password');


        //we check users login details

        //   $type =

        //select the user_name from the admin table assign to $SQL
        $SQL = "SELECT * FROM `members` WHERE  user_name = '$username' AND pass_word = '$password' ";


        //this $SQL query to connect the $db connection which is admin_results
        $member_results = $db->query($SQL);

        $success = ($member_results->num_rows > 0) ? true : false;

           $response['success'] = $success;


               if ($success == true) {
                   //store the users account details in session
                   $_SESSION['user']['account_info'] = $member_results->fetch_assoc();

                   $_SESSION['logged_in'] = true;
				$response['data'] = "logged in okay";
                   $response['success'] = true;
				    
                   //set session user details exist

               }
               else
               {
                   unset($_SESSION['logged_in']);
                   $response['data'] = "incorrect details";
                   $response['success'] = false;
               }



        //echo $_GET['callback']."(".json_encode($response).")";
        returnResponse($response);
    });


});
//-------------------------------------------------any hooks to slim

$app->hook('slim.before.router', function () use ($app) {
    $app->view()->appendData(array('baseUrl' => 'template/include'));
    $app->view()->appendData(array('imagePath' => 'images/'));
    $app->view()->appendData(array('soundPath' => 'template/include/sound/'));
});




$app->run();

function returnResponse($data){
    if (isset($_GET['mobile']) && $_GET['mobile'] == "1" )
        echo json_encode($data['data']);
    else
    echo $_GET['callback']."(".json_encode($data).")";
}