
<?php

session_start();

if (isset($_SESSION['logged_in']) == false) {
    header('location: admin.php');
    exit;
}

require_once("template/connect.php");
//require_once("admin.php");
//we will check $_GET request

if (isset($_GET) && isset($_GET['action']) && !empty($_GET['action'])){

    //proceed to update
    switch($_GET['action']){
        case "upload_images" :
            upload_images();
            break;


        default:
            echo $_GET['action']." is not valid";
            break;
    }
}else{
   echo  "invalid action";
}

//---------------------------------------------------------upload images------------------------------------------
function upload_images(){


  if (isset($_FILES['file'])){
	  
	  $BACK_DIR = '../..';

     $IMAGE_DIR = dirname(__FILE__). DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR  ;

    $name = $_FILES ['file']['name'];
    $tmp_name = $_FILES ['file']['tmp_name'];

    if(!empty($name)){


        if( move_uploaded_file($_FILES["file"]["tmp_name"], $IMAGE_DIR.$name)){

            echo "Uploaded $name";
        }else{
            if (file_exists($IMAGE_DIR.$name)){
                echo "failed to move file $name check file does not exist";
            }else{

                echo "Check dir read/write permission's chmod 777";
            }
        }

    }else{
        echo('Please choose a image');
    }
   // move_uploaded_file("")

      return;
  }
 ?>


        <div id ="uploaded" type="upload_images">

                <input id="file" type="file" name="file">

                <button id="file_upload_button" >Upload</button>

        </div>
        <div id="image_container"></div>
<?php


}

?>