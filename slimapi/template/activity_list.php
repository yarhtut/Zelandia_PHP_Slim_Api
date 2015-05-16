<?php
/**
 * User: 21104216
 * Date: 16/05/2015
 * Time: 10:59 AM
 */

?>
<!--------------------------------------------list Panel--------------------------------------------->
<div id="activity_panel" class=" ">
    </br>
   <!-- <button id="btn_de_active" class="btn btn-danger pull-right">DEACTIVATE</button>
    <button id="btn_save_active_1" class="btn btn-warning pull-right">ACTIVATE</button>
    <button id="btn_add_new" data-toggle="modal" data-target="#myModal" class="btn btn-success pull-left">Add New</button>
-->

    </br> </br> </br>
    <ul id="template_header" class="nav ">
        <li class="col-lg-1" ><h3>NO#</h3></li>
        <li class="col-lg-2" > <h3>User Name</h3></li>
        <li class="col-lg-3" > <h3>School Name</h3></li>
        <li class="col-lg-2" id=""><h3>List Name</h3></li>
        <li class="col-lg-2" id=""><h3>List Image</h3></li>
        <li class="col-lg-1" ><h3>Points</h3></li>
        <li class="col-lg-1" > <h3>Clicked</h3></li>
    </ul>


    <div class="tab_content">
        <div class="activityListView" style="display:none">
            <ul  class="nav list_template " id="template">
                <li class="col-lg-1" id="user_id" ></li>
                <li class="col-lg-2" class="user_name" id="user_name"></li>
                <li class="col-lg-3" class="school_name" id="school_name"></li>
                <li class="col-lg-2" class="list_name" id="list_name"></li>
                <li class="col-lg-2 template_img" ><img id="img" class="btn_option" src=""/></li>

                <li class="col-lg-1" id="points"></li>
                <li class="col-lg-1" id="clicked"></li>

            </ul>
        </div>
    </div>
</div>
<script>
    //-------------------------------------------------get json object and set into clone template button
    var cat = 'activity';
    $.ajax({
        url: 'api/list/' + cat,
        dataType: 'jsonp',
        success: function (response) {
               //clone our template

            if (response.success == true){
                var cat = response.data;

                $.each(cat, function(index,items){
                    var element_name = "list_id_"+items.user_id;
                    //console.log("items",items);
                    var clone_template = $("#template").clone();
                    $(clone_template).attr('id',element_name);
                    $("#user_id", clone_template).text(items.user_id);
                    $("#user_name", clone_template).text(items.user_name);
                    $("#school_name", clone_template).text(items.school_name);
                    $("#list_name", clone_template).text(items.list_name);
                    $("#img", clone_template).attr('src',$imagePath +items.list_img);
                    $("#clicked", clone_template).text(items.clicked);
                    $("#points", clone_template).text(items.list_points);
                    $(".tab_content").append(clone_template);

                })



            } else {
                alert("login failed" + response.data)
            }
            //  console.log("response",response)
        }
    });

</script>