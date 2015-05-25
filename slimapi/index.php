<?php


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
    //render main Sanctuary page
    $app->render('Sanctuary.php');


});
$app->get('/education', function () use($app) {

    $app->render('include/top-menu.php');
    $app->render('include/top_navbar.php');
    $app->render('include/script.php');
    //render main education page
    $app->render('education.php');


});
// render the Sanctuary php page
$app->get('/Sanctuary', function () use($app) {

    $app->render('include/top-menu.php');
    $app->render('include/top_navbar.php');
    $app->render('include/script.php');
    //render main Sanctuary page
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
	$app->get('/sendData', function () use($db,$app, $response) {
	 
        $userDetails = $app->request->get('userDetails');
		$_data = 	$app->request->get('data');
        //define our success
        $success = false; //predine failed response

        //pass json
		$user = json_decode($userDetails);
        $data = json_decode($_data);

        //cleanup user from mobile request
        $user = (isset($user[0])) ? $user[0] : $user;


        //our 1 line SQL statement PLEASE YAR NO BREAK this will check username & password exist
        $SQL_STATEMENT = "INSERT INTO school_activity(`id`, `user_id`, `list_id`, `clicked`) VALUES(null,(SELECT user_id FROM members WHERE user_name = '{$user->user_name}' AND pass_word = '{$user->password}'),?,?);";


        $stmt = $db->prepare($SQL_STATEMENT);
      //  print_r($SQL_STATEMENT);exit;
        foreach($data as $key => $value)
        {
            //print_r($value);exit;
            //as we are bashing the dbase always use a prepare statment i will teach you yar...
            $stmt->bind_param("ii",$value->list_id,$value->CLICKED);

            if ($stmt->execute()) {
                // it worked
                $success = true;
            } else {
                // it didn't this wouldnt work if user didnt have proper username & password
                //maybe add response back message
                $response['data'] = "Inccorect user details";
                //waist of time looping other clicks
                break;
            }

		}		
		


       $response['success'] = $success;
        //$response['data'] = $userDetails;
        returnResponse($response);
        //$response['success'] = $success;
    });
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

    //-------------------------------------------------ADMIN ENABLE WHICH IS ACTIVE OR NOT
    $app->get('/list/activity', function () use($db,$app, $response) {

        $SQL = "SELECT `schools`.`schools_name` ,`members`.`user_name`,`members`.`user_id`,`schools`.`schools_id`,`schools`.`schools_name`,`school_activity`.`clicked`,
`listview`.`list_name`,`listview`.`list_img`,`listview`.`list_points`
FROM  `members`
join `schools` on `members`.`schools_id` = `schools`.`schools_id`

join `school_activity` on `members`.`user_id` = `school_activity`.`user_id`

join `listview` on `school_activity`.`list_id` = `listview`.`list_id`";
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

    //---------------------------------------------Member json data call from api
    $app->get('/members/:type', function ($cat) use($db,$app, $response) {

        $SQL = "SELECT `schools`.`schools_name` ,`members`.`user_name`,`members`.`user_id`,`members`.`pass_word`,`schools`.`schools_id`

            FROM  `members`
            join `schools` on `members`.`schools_id` = `schools`.`schools_id`
            Where `members`.`type_admin`='0'";
        $type_members = $db->query($SQL);

        $success = ($type_members ->num_rows >0) ?true: false;


        $response['success'] = $success;

        $results = array();

        while($result = $type_members->fetch_assoc())
            $results[] = $result;


        $response['data'] = $results;

        // returnResponse($response);
        echo $_GET['callback']."(".json_encode($response).")";
        //$response['success'] = $success;
    });
    //---------------------------------------------------------
    $app->get('/schools', function () use($db,$app, $response) {

        $SQL = "SELECT * FROM `schools`";
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

    //-------------------------------------------------ADMIN ENABLE WHICH IS ACTIVE OR NOT
    $app->get('/list/:cat/1', function ($cat, $active) use($db,$app, $response) {

        if (isset($_POST)&&isset($_POST['list_id']) && isset($_POST['check'])){
            $id = $_POST['list_id'];
            $check = $_POST['check'];
            $SQL_UPDATE = "UPDATE `listview` SET `check` = '$check' WHERE `id` = '$id' ";

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


    //============================LIST VIEW FOR EDUCATION ONLY SHOW WHICH IS ACTIVE '1' BY ADMIN==========
    $app->get('/list/:cat/:active', function ($cat, $active) use($db,$app, $response) {
        $active_request = ($active == 'active')? 1 : 0 ;
        $SQL = "SELECT * FROM `listview` WHERE `list_cat` = '$cat' AND `list_active` = '$active_request';";
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

    //============================LIST VIEW FOR EDUCATION ONLY SHOW WHICH IS ACTIVE '1' BY ADMIN==========
    $app->get('/list/:active', function ( $active) use($db,$app, $response) {
        $active_request = ($active == 'active')? 1 : 0 ;
        $SQL = "SELECT * FROM `listview` WHERE `list_active` = '$active_request';";
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

    //========================================update our list from admin panel===========================
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
                $list_type = $app->request->post("list_type");
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

                    $SQL_INSERT = "INSERT INTO `listview` (`list_name`,`list_cat`,`list_type`, `list_img`, `list_sound`,`list_points`, `list_desc`) VALUES ( '$list_name','$list_cat','$list_type', '$list_img', '$list_sound','$list_points', '$list_desc');";

                    //returnResponse($SQL_INSERT);
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
                    $SQL_UPDATE = "UPDATE `listview` SET `list_name` = '$list_name', `list_cat` = '$list_cat',`list_type`='$list_type', `list_img` = '$list_img' , `list_sound` = '$list_sound', `list_points` = '$list_points' , `list_desc` = '$list_desc' WHERE `list_id` = '$list_id';";

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

                    //check $items contains length string or possible use is_array

                    $IDS = implode(",", $items);
                    $SQL = "UPDATE  `listview` SET  `list_active` =  '1' WHERE `list_id` IN($IDS) ";
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
                    $SQL = "UPDATE  `listview` SET  `list_active` =  '0';";

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
        //echo json_encode($response);
        //echo $_GET['callback']."(".json_encode($response).")";
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

                $schools_id = $app->request->post("schools_id");
                //lets update MEMBER
                //deletes

                if ($action == 'addNewMember'){

                    $SQL_INSERT = "INSERT INTO `members` (`user_name`, `pass_word`, `schools_id`) VALUES
                    ('$member_username', '$member_password', '$schools_id');";

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

                    $SQL_DELETE = "DELETE FROM `members` WHERE `user_id` = '$member_id';";


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

                   // $SQL_UPDATE = "UPDATE `members` SET `user_name` = '$member_username', `pass_word` = '$member_password' , `cellnumber` = '$member_mobile' WHERE `id` = '$member_id';";
                    $SQL_UPDATE = "UPDATE `members` SET `user_name` = '$member_username', `pass_word` = '$member_password' ,`schools_id` = '$schools_id' WHERE `user_id` = '$member_id';";

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
        //echo json_encode($response);
        //echo $_GET['callback']."(".json_encode($response).")";
        returnResponse($response);
    });
    //======================================update our list from member panel
    $app->post('/schoolsUpdate/:action', function ($action) use($db,$app, $response) {
        //security check ONLY admin can update
        //CHECK SESSION ACCOUNT
        $response['success'] = false;

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            //render the admin page
            if ($_SESSION['user']['account_info']['type_admin'] == 1) {

                $schools_id = $app->request->post("schools_id");
                $schools_name = $app->request->post("schools_name");

                //lets update MEMBER
                //deletes

                if ($action == 'addNewSchools'){

                    $SQL_INSERT = "INSERT INTO `schools` (`schools_name`) VALUES
                    ('$schools_name');";

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
                if ($action == 'deleteSchools'){

                    $SQL_DELETE = "DELETE FROM `schools` WHERE `schools_id` = '$schools_id';";


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
                if ($action == 'updateSchools'){
                    // $active = $app->request->post("data");

                    // $SQL_UPDATE = "UPDATE `members` SET `user_name` = '$member_username', `pass_word` = '$member_password' , `cellnumber` = '$member_mobile' WHERE `id` = '$member_id';";
                    $SQL_UPDATE = "UPDATE `schools` SET `schools_name` = '$schools_name'  WHERE `schools_id` = '$schools_id';";

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
        //echo json_encode($response);
        //echo $_GET['callback']."(".json_encode($response).")";
        returnResponse($response);
    });
    //------------------------------------------------- LOGIN-----------------------------------------------
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
        echo json_encode($response);
        //returnResponse($response);
        //echo $_GET['callback']."(".json_encode($response).")";

    });
    $app->get('/login', function () use($db,$app, $response) {
        $username = $app->request->get('username');
        $password = $app->request->get('password');

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


      //  echo json_encode($response);
       // echo $_GET['callback']."(".json_encode($response).")";
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
	
	header("access-control-allow-origin: *");
	header('Content-Type: application/json');


    if (isset($_GET['mobile']) && $_GET['mobile'] == "1" )
        echo json_encode($data['data']);
    else
    echo $_GET['callback']."(".json_encode($data).")";

    die();
}