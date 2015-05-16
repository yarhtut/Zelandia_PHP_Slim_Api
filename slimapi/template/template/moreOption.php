

<?php

session_start();




if (isset($_GET) && isset($_GET['action']) && !empty($_GET['action'])){

//proceed to update
switch($_GET['action']){

    case "moreOption" :
        moreOption();
        break;
    default:
        echo $_GET['action']." is not valid";
        break;
}
}else{
    echo  "invalid action";
}




function moreOption(){



}
?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-title="Feedback">Feedback</button>
