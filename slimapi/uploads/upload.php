<?php
    require("admin.php");

?>
<?php
$name = $_FILES ['file']['name'];
$tmp_name = $_FILES ['file']['tmp_name'];


if(isset($name)){
    if(!empty($name)){
        $location = '../images/galleries/';

        if( move_uploaded_file($tmp_name, $location.$name)){
            echo ("Uploaded");
        }

    }else{
        echo('Please choose a image');
    }
}

?>
<div id ="upload" type="upload_images">
    <form action="upload_images" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="Upload">
    </form>
</div>