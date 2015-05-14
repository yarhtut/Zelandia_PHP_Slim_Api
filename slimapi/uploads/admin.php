<link rel="stylesheet" href="stylesheet/login.css" />
<script src="libs/jquery.min.js"></script>

<?php
/**
 * Created by PhpStorm.
 * User: 21104216
 * Date: 17/05/14
 * Time: 12:07 PM
 */
require_once ("database.php");


session_start();




if (isset($_GET) && isset($_GET['logout'])){
    session_destroy();
    header('location: index.php');
    return;
}

if (isset($_SESSION['logged_in']) == false) {

    ?>
    <html>
    <body class="aa">
    <div id="loginform">
        <section id="container">

        <form id="log" action="admin.php" method="POST">
            <ul id="log_ul">
                <li> <span class="backto"><em><a href="index.php">&laquo; back to the site</a></em></span></li><br>
                <li><input type="text" name="username"id="username" placeholder="Username"></li>
                <li> <input type="password" name="password" id="password" placeholder="Password"></li><br>
                <li><input type="submit" type="submit" id="submit" name="Submit" value="LOGIN"></li>
            </ul>

         <br/>
         <br/>

        </form>
        </section>
    </div>
    </body>
    </html>
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

    <div class="dash colum0">

            <ul id="dashboard_menu">
                <li><a href="index.php" title="Back to the homepage"><img src="images/admin/home.png" width="40px" height="40px"><p>Capital Organic<p></p></a></li>
                <li><a href="client.php" title="Show the client contact list"><img src="images/admin/client.png" width="40px" height="40px"><p>Clients Contact List <p></p></a></li>
                <li><a href="order.php" title="Show the Order list"><img src="images/admin/client.png" width="40px" height="40px"><p>Customer Purchase List <p></p></a></li>
                <li id="logout">  <a href="?logout" title="logout yar"/><img src="images/icon/lot.png"</a></li>

             </ul>



        </div>

    <div id="col10">
        <div id="dash_left">
            <ul id="nav_dash_left">
                <li id="Dashboard" ><a href="?">Dashboard</a></li>
                <li id="logoo"><a id="fac" class="sub" tabindex="1">Top Logo</a>
                <ul>
                <li id="logo_update"> <a id="fac">Update Top Logo</a></li>
                <li id="logo_delete"><a href="update.php?action=delete_top_logo"/>Delete Top Logo</a></li>
                </ul>
                </li>

                <li id="social_update"><a id="fac" class="sub" tabindex="1">Social</a>
                    <ul>
                        <!-- href="update.php?action=top_social_facebook" !-->

                <li id="social_facebook_delete"><a href="update.php?action=delete_top_social_facebook"/>Delete facebook</a></li>


                <li id="social_twitter_delete"><a href="update.php?action=delete_top_social_twitter"/>Delete Twitter</a></li>


                <li id="social_google_delete"><a href="update.php?action=delete_top_social_google"/>Delete G+</a></li>
                    </ul>
                </li>

                <li><a class="sub" tabindex="1">Index</a>
                    <ul>
                        <li id="index_advert"><a id="fac">Index Advertisement</a></li>



                        <li id="index_col5"><a id="fac">Index Content</a></li>


                    </ul>
                </li>

                <li id="product_update"><a class="sub" tabindex="1">Products</a>
                    <ul>
                        <li id="add_products"><a id="fac">Add Products</a></li>
                        <li id="product_vegetables"><a id="fac">Vegetables</a></li>

                        <li id="product_fruits"><a id="fac">Fruits</a></li>

                        <li id="product_drinks"><a id="fac">Drinks</a></li>

                        <li id="product_bakerys"><a id="fac">Bakery</a></li>

                        <li id="product_meats"><a id="fac">Meats</a></li>


                    </ul>
                </li>

                <li><a>Menu</a></li>

                <li id="features"><a id="fac">Features Col3</a></li>

                <li id="upload" ><a id="fac">UpLoad Image</a></li>
            </ul>
        </div>

        <div id="dash_right">
            <div id="dd">
                <p></p>

            </div>
            <div id="dd_show">

            </div>

         </div>

    </div>

<?php
}
?>








<script type="text/javascript">
$("#social_update #fac").click(function(){

    $.ajax({
        url : "socialupdate.php",
        method : "GET",
        success : function(response){

            $("#dd").html(response).css({
                width : 1100,
                margin: 'auto'
            })
        }
    })
})

//--------------------------------------------------------------------social facebook---------------------------------
    $("#social_facebook_update #fac").click(function(){

        $.ajax({
            url : "update.php?action=top_social_facebook",
            method : "GET",
            success : function(response){
                console.log("respsonse",response)
                $("#dd").html(response).css({
                    width : 400,
                    margin: 'auto'
                })
            }
        })
    })

//-----------------------------------------------------------------------social twitter-------------------------------
    $("#social_twitter_update #fac").click(function(){

        $.ajax({
            url : "update.php?action=top_social_twitter",
            method : "GET",
            success : function(response){
                console.log("respsonse",response)
                $("#dd").html(response).css({
                    width : 400,
                    margin: 'auto'
                })
            }
        })
    })
//----------------------------------------------------------------------------social google------------------------------
    $("#social_google_update #fac").click(function(){

        $.ajax({
            url : "update.php?action=top_social_twitter",
            method : "GET",
            success : function(response){
                console.log("respsonse",response)
                $("#dd").html(response).css({
                    width : 400,
                    margin: 'auto'
                })
            }
        })
    })
    //------------------------------------------------------------------------TOP LOGO-------------------------------
    $("#logo_update #fac").click(function(){

        $.ajax({
            url : "update.php?action=top_logo",
            method : "GET",
            success : function(response){
                console.log("respsonse",response)
                $("#dd").html(response).css({
                    width : 400,
                    margin: 'auto'
                })
            }
        })
    })
//---------------------------------------------------------Products update
//binding that variable is exist
/*
$(document).on("click","#update_button",function(){
    alert("HERE 1");
    var product_id = $(this).attr("index");
    var type_product = $("#product").attr("type");
    var product_div =   $("ul#"+product_id);

    // console.log($("#product_h2",product_div).val())
    //console.log("product_div",product_div);

    var update_details = {
        index      : product_id,
        product_h2 : $("#product_h2",product_div).val(),
        product_img : $("#product_img",product_div).val(),
        product_p : $("#product_p",product_div).val()
    }

    $.ajax({
        url : "update.php?action="+type_product,
        method : "POST",
        data : update_details,
        success : function(response){

            console.log("response",response)

            if (/success/.test(response)){
                alert("Updated");
                window.location.href = "products.php"
            }else{
                alert("Failed : "+response )
                console.log(response)
            }


        }

    })

})*/
//---------------------------------------------------------ajax for Vegetables update----------------------
    $("#product_vegetables #fac").click(function(){

        $.ajax({
            url : "products/vegetables.php",
            method : "GET",
            success : function(response){
               // console.log("respsonse",response)
                $("#dd").html(response).css({
                    //width : '95%',
                    //height:300,
                    margin: 'auto'
                })
            }
        })
    })




//------------------------------------------------------------delete vegetables----------------------------
    $("#delete_product_vegetables #fac").click(function(){

        $.ajax({
            url : "update.php?action=delete_product_vegetables",
            method : "GET",
            success : function(response){
                // console.log("respsonse",response)
                $("#dd").html(response).css({
                    width : 1100,
                    //height:300,
                    margin: 'auto'
                })

            }

        })

    })
    //binding that variable is exist
    $(document).on("click","#product #delete_button",function(){

        var product_id = $(this).attr("index");
        var type_product = $("#product").attr("type");
        var product_div =   $("ul#"+product_id);

        // console.log($("#product_h2",product_div).val())
        //console.log("product_div",product_div);

        var update_details = {
            index      : product_id,
            product_h2 : $("#product_h2",product_div).val(),
            product_img : $("#product_img",product_div).val(),
            product_p : $("#product_p",product_div).val()
        }

        $.ajax({
            url : "update.php?action="+type_product,
            method : "POST",
            data : update_details,
            success : function(response){

                console.log("respsonse",response)

                if (/success/.test(response)){
                    alert("Delete");
                    window.location.href = "products.php"
                }else{
                    alert("Failed : "+response )
                    console.log(response)
                }
                /*
                 $("#dd").html(response).css({
                 width : 400,
                 margin: 'auto'
                 })
                 */

            }

        })

    })
//---------------------------------------------------------ajax for fruits update----------------------
    $("#product_fruits #fac").click(function(){

        $.ajax({
            url : "products/fruits.php",
            method : "GET",
            success : function(response){
                // console.log("respsonse",response)
                $("#dd").html(response).css({
                    width : 1100,
                    //height:300,
                    margin: 'auto'
                })

            }

        })

    })

    //$("#update_product_fruits #fac").css({
       // cursor : 'pointer'

    //binding that variable is exist
/*
    $(document).on("click","#update_button",function(){
        alert("HERE 2");
        var product_id = $(this).attr("index");
        var type_product = $("#product").attr("type");
        var product_div =   $("ul#"+product_id);

        // console.log($("#product_h2",product_div).val())
        //console.log("product_div",product_div);

        var update_details = {
            index      : product_id,
            product_h2 : $("#product_h2",product_div).val(),
            product_img : $("#product_img",product_div).val(),
            product_p : $("#product_p",product_div).val()
        }

        $.ajax({
            url : "update.php?action="+type_product,
            method : "POST",
            data : update_details,
            success : function(response){

                console.log("respsonse",response)

                if (/success/.test(response)){
                    alert("Updated");
                }else{
                    alert("Failed : "+response )
                    console.log(response)
                }


            }

        })

    })*/
//---------------------------------------------------------ajax for drinks update----------------------
$("#product_drinks #fac").click(function(){

    $.ajax({
        url : "products/drinks.php",
        method : "GET",
        success : function(response){
            // console.log("respsonse",response)
            $("#dd").html(response).css({
                width : 1100,
                //height:300,
                margin: 'auto'
            })

        }

    })

})

/*
//binding that variable is exist
$(document).on("click","#update_button",function(){
    alert("HERE 3");
    var product_id = $(this).attr("index");
    var type_product = $("#product").attr("type");
    var product_div =   $("ul#"+product_id);

    // console.log($("#product_h2",product_div).val())
    //console.log("product_div",product_div);

    var update_details = {
        index      : product_id,
        product_h2 : $("#product_h2",product_div).val(),
        product_img : $("#product_img",product_div).val(),
        product_p : $("#product_p",product_div).val()
    }

    $.ajax({
        url : "update.php?action="+type_product,
        method : "POST",
        data : update_details,
        success : function(response){

            console.log("respsonse",response)

            if (/success/.test(response)){
                alert("Updated");
            }else{
                alert("Failed : "+response )
                console.log(response)
            }


        }

    })

})*/
//---------------------------------------------------------ajax for Bakerys update------------------------
$("#product_bakerys #fac").click(function(){

    $.ajax({
        url : "products/bakerys.php",
        method : "GET",
        success : function(response){
            // console.log("respsonse",response)
            $("#dd").html(response).css({
                width : 1100,
                //height:300,
                margin: 'auto'
            })

        }

    })

})

//---------------------------------------------------update button for all products-------------------------------------
//binding that variable is exist
$(document).on("click","#product #update_button",function(){

    var product_id = $(this).attr("index");
    var type_product = $("#product").attr("type");
    var product_div =   $("ul#"+product_id);

    // console.log($("#product_h2",product_div).val())
    //console.log("product_div",product_div);

    var update_details = {
        index      : product_id,
        product_h2 : $("#product_h2",product_div).val(),
        product_img : $("#product_img",product_div).val(),
        product_p : $("#product_p",product_div).val()
    }

    $.ajax({
        url : "update.php?action="+type_product,
        method : "POST",
        data : update_details,
        success : function(response){

            console.log("respsonse",response)

            if (/success/.test(response)){
                alert("Updated");
                window.location.href = "products.php"
            }else{
                alert("Failed : "+response )
                console.log(response)
            }


        }

    })

})
//---------------------------------------------------------ajax for Meats update----------------------------------------
$("#product_meats #fac").click(function(){

    $.ajax({
        url : "products/meats.php",
        method : "GET",
        success : function(response){
            // console.log("respsonse",response)
            $("#dd").html(response).css({
                width : 1100,
               // height:300,
                margin: 'auto'
            })

        }

    })

})
//-----------------------------------------------------------------------Add Products------------------------------------------------
    $("#add_products #fac").click(function(){

        $.ajax({
            url : "update.php?action=add_products",
            method : "GET",
            success : function(response){
                // console.log("respsonse",response)
                $("#dd_show").html(response).css({
                    width : 1100,
                //    height:300,
                    margin: 'auto'
                })

            }

        })

    })
    $(document).on("click","#add_product_button",function(){
        var product_add = {
            product_h2 : $("#product_add_container #product_h2").val(),
            product_img : $("#product_add_container #product_img").val(),
            product_p : $("#product_add_container #product_p").val(),
            product_catagories : $("#product_add_container #product_catagories").val()
        }
       // console.log("product_add",product_add);
        //return;
        $.ajax({
            url : "update.php?action=add_products",
            method : "POST",
            data: product_add ,
            success : function(response){
                console.log("response",response)
                window.location.href = "products.php"

            }
        })
    })
//-----------------------------------------------------------------------Add Index Advert-------------------------------------------
$("#index_advert #fac").click(function(){

    $.ajax({
        url : "index/advertisement.php",
        method : "GET",
        success : function(response){
            // console.log("respsonse",response)
            $("#dd").html(response).css({
                width : 1100,
             //   height:300,
                margin: 'auto'
            })

        }

    })

})
$(document).on("click","#add_index_advert_button",function(){
    var advert_add = {
        ad_top_img : $("#index_advert_add_container #ad_top_img").val(),
        ad_bot_img : $("#index_advert_add_container #ad_bot_img").val(),
        ad_h4 : $("#index_advert_add_container #ad_h4").val(),
        ad_h5 : $("#index_advert_add_container #ad_h5").val(),
        ad_catagories : $("#index_advert_add_container #ad_catagories").val()
    }
    // console.log("product_add",product_add);
    //return;
    $.ajax({
        url : "update.php?action=insert_index_advert",
        method : "POST",
        data: advert_add ,
        success : function(response){
            console.log("response",response)
            window.location.href = "index.php"

        }
    })
})
//----------------------------------------------------------------ajax for Update Index Advert-------------------------
$("#update_index_advert #fac").click(function(){

    $.ajax({
        url : "update.php?action=update_index_advert",
        method : "GET",
        success : function(response){
            // console.log("respsonse",response)
            $("#dd").html(response).css({
                width : 1100,
               // height:300,
                margin: 'auto'
            })

        }

    })

})


//binding that variable is exist
$(document).on("click","#advert #update_button",function(){

    var advert_id = $(this).attr("index");

    var type_advert = $("#advert").attr("type");
    var advert_div =   $("ul#"+advert_id)[0];


    // console.log($("#product_h2",product_div).val())
    //console.log("product_div",product_div);
    /*
     index: "1", ad_top_img: undefined, ad_bot_img: undefined, ad_h4: undefined, ad_h5: undefined…}

     */
    var update_details = {
        index       : advert_id,
        ad_top_img  : $("#ad_top_img",advert_div).val(),
        ad_bot_img  : $("#ad_bot_img",advert_div).val(),
        ad_h4       : $("#ad_h4",advert_div).val(),
        ad_h5       : $("#ad_h5",advert_div).val(),
        ad_catagories:$("#ad_catagories",advert_div).val()
    }

    $.ajax({
        url : "update.php?action=update_index_advert",
        method : "POST",
        data : update_details,
        success : function(response){

            console.log("respsonse",response)

            if (/success/.test(response)){
                alert("Updated");
                window.location.href = "index.php"
            }else{
                alert("Failed : "+response )
                console.log(response)
            }
            /*
             $("#dd").html(response).css({
             width : 400,
             margin: 'auto'
             })
             */

        }

    })

})
//--------------------------------------------------------------Delete Insert Advert-------------------------------
$("#delete_index_advert #fac").click(function(){

    $.ajax({
        url : "update.php?action=delete_index_advert",
        method : "GET",
        success : function(response){
            // console.log("respsonse",response)
            $("#dd").html(response).css({
                width : 1100,
            //    height:400,
                margin: 'auto'
            })

        }

    })

})
//binding that variable is exist
$(document).on("click","#advert #delete_advert_button",function(){

    var advert_id = $(this).attr("index");
    var type_advert = $("#advert").attr("type");
    var advert_div =   $("ul#"+advert_id);

    // console.log($("#product_h2",product_div).val())
    //console.log("product_div",product_div);

    var delete_details = {
        index      : advert_id,
        ad_top_img  : $("#ad_top_img",advert_div).val(),
        ad_bot_img  : $("#ad_bot_img",advert_div).val(),
        ad_h4       : $("#ad_h4",advert_div).val(),
        ad_h5       : $("#ad_h5",advert_div).val(),
        ad_catagories:$("#ad_catagories",advert_div).val()
    }

    $.ajax({
        url : "update.php?action="+type_advert,
        method : "POST",
        data : delete_details,
        success : function(response){


            if (/success/.test(response)){
                alert("Delete");
                window.location.href = "index.php"
            }else{
                alert("Failed : "+response )
                console.log(response)
            }
            /*
             $("#dd").html(response).css({
             width : 400,
             margin: 'auto'
             })
             */

        }

    })

})
//-----------------------------------------------------------------------Add Index Content Col5-------------------------
$("#index_col5 #fac").click(function(){

    $.ajax({
        url : "index/content_post.php",
        method : "GET",
        success : function(response){
            // console.log("respsonse",response)
            $("#dd").html(response).css({
                width : 1100,
             //   height:300,
                margin: 'auto'
            })

        }

    })

})
$(document).on("click","#add_index_col5_button",function(){
    var content_add = {
        content_img : $("#index_col5_add_container #content_img").val(),
        content_h2 : $("#index_col5_add_container #content_h2").val(),
        content_p : $("#index_col5_add_container #content_p").val(),
        content_post_catagories : $("#index_col5_add_container #content_post_catagories").val()
    }
    // console.log("product_add",product_add);
    //return;
    $.ajax({
        url : "update.php?action=insert_index_col5",
        method : "POST",
        data: content_add ,
        success : function(response){
            console.log("response",response)
            window.location.href = "index.php"

        }
    })
})
//---------------------------------------------------------ajax for Update Index Content Col5-------------------------

//binding that variable is exist
$(document).on("click","#index_content #update_content_button",function(){

    var content_id = $(this).attr("index");
    var type_content = $("#index_content").attr("type");
    var content_div =   $("ul#"+content_id)[0];


    var update_content_details = {
        index       : content_id,
        content_img  : $("#content_img",content_div).val(),
        content_h2  : $("#content_h2",content_div).val(),
        content_p       : $("#content_p",content_div).val(),
        content_post_catagories:$("#content_post_catagories",content_div).val()
    }

    $.ajax({
        url : "update.php?action=update_index_col5"+type_content,
        method : "POST",
        data : update_content_details,
        success : function(response){

            console.log("respsonse",response)

            if (/success/.test(response)){
                alert("Updated");
                window.location.href = "index.php"
            }else{
                alert("Failed : "+response )
                console.log(response)
            }
           }

    })

})
//------------------------------------------------------------Delete index content--------------------------------------

//binding that variable is exist
$(document).on("click","#index_content #delete_index_content_button",function(){

    var content_id = $(this).attr("index");
    var type_content = $("#index_content").attr("type");
    var content_div =   $("ul#"+content_id);


    var delete_content_details = {
        index       : content_id,
        content_img  : $("#content_img",content_div).val(),
        content_h2  : $("#content_h2",content_div).val(),
        content_p       : $("#content_p",content_div).val(),
        content_post_catagories:$("#content_post_catagories",content_div).val()
    }

    $.ajax({
        url : "update.php?action="+type_content,
        method : "POST",
        data : delete_content_details,
        success : function(response){


            if (/success/.test(response)){
                alert("Delete");
                window.location.href = "index.php"
            }else{
                alert("Failed : "+response )
                console.log(response)
            }

        }

    })

})
//---------------------------------------------------------ajax for Update Features Col3-------------------------
$("#features #fac").click(function(){

    $.ajax({
        url : "features_col3.php",
        method : "GET",
        success : function(response){

            $("#dd").html(response).css({
                width : 1100,
                margin: 'auto'
            })
        }
    })
})
//binding that variable is exist
$(document).on("click","#features_div #update_features_button",function(){

    var features_id = $(this).attr("index");
    var type_features = $("#features_div").attr("type");
    var features_div =   $("ul#"+features_id)[0];


    var update_Features_details = {
        index       : features_id,
        features_top_h4  : $("#features_top_h4",features_div).val(),
        features_top_p  : $("#features_top_p",features_div).val(),
        features_img       : $("#features_img",features_div).val(),
        features_bot_h3       : $("#features_bot_h3",features_div).val(),
        features_bot_h4       : $("#features_bot_h4",features_div).val(),
        page_categories:$("#page_categories",features_div).val()
    }

    $.ajax({
        url : "update.php?action=update_features_col3",
        method : "POST",
        data : update_Features_details,
        success : function(response){

            console.log("respsonse",response)

            if (/Successs/.test(response)){
                alert("Updated");
                window.location.href = "index.php"
            }else{
                alert("Failed : "+response )
                console.log(response)
            }
        }

    })

})
//-----------------------------------------------------------------------------ajax Upload------------------------------
    //click admin upload button
    $("#upload #fac").click(function(){

        $.ajax({
            url : "update.php?action=upload_images",
            method : "GET",
            success : function(response){

                $("#dd").html(response).css({
                    width : 400,
                    margin: 'auto'
                })

            }

        })

    })

    //click upload button
    $(document).on("click","#uploaded #file_upload_button",function(){
        //create file form post data
        var formData = new FormData();
        var image = $("#file")[0].files[0];

        if (typeof image == "undefined"){
            alert("Please select image to upload");
            return;
        }

        formData.append("file", image);

        $.ajax({
            url: "update.php?action=upload_images",  //Server script to process data
            type: "POST",
            success: function(response){
                console.log(response)
                if (/Uploaded/.test(response)){

                    //reset file so new upload
                    $("#file").val("");
                    var image_name = image.name;
                    $("#image_container").append(
                        "<img src='images/galleries/"+image_name+"' />"
                    ) .css({
                            width : 400,
                //            height:300,
                            margin: 'auto'
                        })
                }

                if (/failed/.test(response)){
                    alert(response);
                }

            },
            // Form data
            data: formData,

            cache: false,
            contentType: false,
            processData: false
    });
    });

</script>

