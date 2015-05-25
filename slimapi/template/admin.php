
<?php

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
                    <li class="home-back"><a href="home" title="Back to the homepage"><i class="fa fa-home"></i> Back to the Home Page</a></li>

                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li class="logout pull-right"> <a id="logout" href="admin/logout" title="logout yar"><i class="fa fa-sign-out"> Log Out</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="main_admin_body ">
    <!--------------------------------admin left panel ----------------------------->
    <div id="navbarCollapse" class= " col-lg-2 col-md-2 admin_panel_left">
        <ul class="nav nav-pills nav-stacked" id="myTab_admin">
            <li class="admin_panel"><a data-toggle="tab"  id="list_view" href="#">List View Panel</a></li>
            <li class="members_panel"><a data-toggle="tab" id="members_panel" href="#">Member Panel</a></li>
            <li class="members_panel"><a data-toggle="tab" id="schools_panel" href="#">School Panel</a></li>


            <li class="dropdown activityListView"  id="activity_tab">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#" id="activity_list">School Activities<b class="caret"></b></a>
                <ul class="dropdown-menu activity_school_list" style="display:none">
                    <li  href=""id="clone_activity_template" ><a id="school_list"></a></li>

                </ul>

            </li>

        </ul>
    </div>
    <!----------------------------------admin right-------------------------->
    <div class="col-lg-10 col-md-10 main_admin_right " id="main_test">
    </div>

</div>
</div>

<!--==================================== Modal HTML Admin Panel More Option===================================================== -->
<div id="myModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                                        <h4 class="modal-title">List View Update Insert Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form">
                                            <div class="form-group">
                                                <label for="id" class="control-label">ID:</label>
                                                <input type="text" class="form-control" id="form_id" value="">
                                            </div>
                                             <div class="form-group">
                                                <label for="catagories" class="control-label">Categories:</label>
                                                <!--<input type="text" class="form-control" id="form_cat" value="">-->
                                                   <select class="form-control" id="form_cat">

                                                      <option value="birds">Bird</option>

                                                      <option value="insects">Insects</option>

                                                      <option value="plants">Plants</option>

                                                      <option value="mammals">mammals</option>

                                                      <option value="others">Others</option>

                                                </select>

                                            </div>
                                             <div class="form-group">
                                                <label for="classification" class="control-label">Classification:</label>
                                                <!--<input type="text" class="form-control" id="form_cat" value="">-->
                                                   <select class="form-control" id="form_type">

                                                      <option value="Critical">Nationally Critical</option>

                                                      <option value="Endangered">Nationally Endangered</option>

                                                      <option value="Vulnerable">Nationally Vulnerable</option>

                                                      <option value="Declining">Declining</option>

                                                       <option value="Recovering">Recovering</option>

                                                      <option value="Relict">Relict</option>

                                                      <option value="Uncommon">Uncommon</option>

                                                      <option value="Not_threatened">Not Threatened</option>

                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Name:</label>
                                                <input type="text" class="form-control" id="form_name" value="">
                                            </div>
                                            <div class="form-group">
                                              <div id="upload_image_div"></div>
                                              <button class="btn btn-primary upload_panel pull-right"><a data-toggle="tab" href="#" id="upload">Upload Image</a></button>
                                                <label for="Image" class="control-label">Images:</label>
                                                <input type="text" class="form-control" id="form_img"/>
                                                 <div id="upload_image_div"></div>
                                                 <div id="show_upload_image"></div>
                                            </div>
                                            <div class="form-group">
                                         <!--   <button class="btn btn-primary  pull-right"><a data-toggle="tab" href="#" id="upload_sound">Upload Mp3</a></button>-->
                                                <label for="sound" class="control-label">Sound:</label>
                                                <input type="text" class="form-control" id="form_sound">
                                                 <div id="upload_mp3_div"></div>

                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Points:</label>
                                                <input type="text" class="form-control" id="form_points">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Description:</label>
                                                <textarea class="form-control" id="desc_text"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                         <button type="button" class="btn btn-danger list_btn_delete" >Delete</button>
                                        <button type="button" class="btn btn-primary list_btn_update">Update</button>
                                        <button type="button" class="btn btn-success list_btn_add_new">Add New</button>
                                    </div>
                                </div>
                            </div>
</div>
<!--==================================== Modal HTML School Panel More Option=================================================== -->
<div id="myModalSchools" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                                        <h4 class="modal-title">Schools Update Insert Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form">
                                            <div class="form-group">
                                                <label for="id" class="control-label">School ID:</label>
                                                <input type="text" class="form-control" id="schools_form_id" value="">
                                            </div>
                                             <div class="form-group">
                                                <label for="name" class="control-label">School Name:</label>
                                                <input type="text" class="form-control" id="schools_form_name" value="">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                         <button type="button" class="btn btn-danger schools_btn_delete" >Delete</button>
                                        <button type="button" class="btn btn-primary schools_btn_update">Update</button>
                                        <button type="button" class="btn btn-success schools_btn_add_new">Add New</button>
                                    </div>
                                </div>
                            </div>
</div>

<!--==================================== Modal HTML Members Panel More Option=================================================== -->
<div id="myModalMembers" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                                        <h4 class="modal-title">Members Update Insert Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form">
                                            <div class="form-group">
                                                <label for="id" class="control-label">ID:</label>
                                                <input type="text" class="form-control" id="members_form_id" value="">
                                            </div>
                                             <div class="form-group">
                                                <label for="catagories" class="control-label">Username:</label>
                                                <input type="text" required class="form-control" id="members_username" value=""required/>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Password:</label>
                                                <input type="text" required class="form-control" id="members_password" value="" required/>
                                            </div>
                                            <div class="form-group">
                                                <label for="number" class="control-label">School Id:</label>
                                                <input type="text"  class="form-control" id="members_schools_id" value="" required/>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                         <button type="button" class="btn btn-danger members_btn_delete" >Delete</button>
                                        <button type="button" class="btn btn-primary members_btn_update">Update</button>
                                        <button type="button" class="btn btn-success members_btn_add_new">Add New</button>
                                    </div>
                                </div>
                            </div>
</div>
    <?php


}
?>
<script>

    $("document").ready(function(){
        $("#form_id").prop('disabled', true);
        $("#schools_form_id").prop('disabled', true);
        $("#members_form_id").prop('disabled', true);

        $("input[name = '1']").attr('checked' , true);

        $('#list_view').on('click', function(){
            $( "#main_test" ).load( "template/list_view.php", function() {
                //alert( "Load was performed." );
            });
        })
        $('#members_panel').on('click', function(){
            $( "#main_test" ).load( "template/member_panel.php", function() {
                var type = '0';
                $.ajax({
                    url : 'api/members/'+type,
                    dataType : 'jsonp',
                    success : function(response){
                        //clone our template
                        if (response.success == true){
                            var type = response.data;
                            // console.log("cat",response.data)
                            $.each(type, function(index,items){
                                var clone_template = $("#template_members").clone();
                                $(clone_template).attr('id',"members_id_"+items.user_id);
                                // $(clone_template).addClass("schools_id_"+items.schools_id);

                                $("#members_id", clone_template).text(items.user_id);
                                $("#username", clone_template).text(items.user_name);
                                $("#password", clone_template).text(items.pass_word);
                                $("#school_name", clone_template).text(items.schools_name);
                                $("#schools_id", clone_template).text(items.schools_id);
                                $("#type_admin", clone_template).text(items.type_admin);
                                $(".btn_members_option", clone_template).attr('members_id_add',+ items.user_id);
                                $(".tab_content_members").append(clone_template);
                            })

                            $('.btn_members_option').on('click',function(){
                                $(".members_btn_add_new").hide();
                                $('.members_btn_delete').show();
                                $('.members_btn_update').show();
                                //$("#members_form_id").prop('disabled', true);
                                var btn_option_id =  $(this).attr("members_id_add");
                                var theDiv = $('#members_id_'+btn_option_id);
                                var members_id = $( "#members_id",theDiv).text();
                                var members_name = $( "#username",theDiv).text();
                                var members_password = $('#password', theDiv).text();
                                var school_name = $( "#school_name",theDiv).text();
                                var schools_id = $("#schools_id",theDiv).text();
                                var type_admin = $( "#type_admin",theDiv).text();

                                $('#members_form_id').val(members_id);
                                $('#members_username').val(members_name);
                                $('#members_password').val(members_password);
                                $('#members_schools_id').val(schools_id);
                                $('#type_admin').val(type_admin);


                            })

                        }else{
                            //alert("login failed" + response.data)
                        }
                        //  console.log("response",response)
                    }
                });
            });
        })
        $('#schools_panel').on('click', function(){
            $( "#main_test" ).load( "template/school_panel.php", function() {
                //-------------------------------------------------get json object and set into clone template button-----------------
                var type = '0';
                $.ajax({
                    url : 'api/schools',
                    dataType : 'jsonp',
                    success : function(response){
                        //clone our template
                        if (response.success == true){
                            var type = response.data;
                            // console.log("cat",response.data)
                            $.each(type, function(index,items){
                                var clone_template = $("#schools_template").clone();
                                $(clone_template).attr('id',"schools_id_"+items.schools_id);
                                $("#schools_id", clone_template).text(items.schools_id);
                                $("#school_name", clone_template).text(items.schools_name);
                                $(".btn_schools_option", clone_template).attr('schools_id_add',+ items.schools_id);
                                $(".tab_content").append(clone_template);
                            })

                            $('.btn_schools_option').on('click',function(){


                                $('.schools_btn_delete').show();
                                $('.schools_btn_update').show();
                                $('.schools_btn_add_new').hide();

                                var btn_option_id_schools =  $(this).attr("schools_id_add");

                                var theDiv = $('#schools_id_'+btn_option_id_schools);
                                var schools_id = $( "#schools_id",theDiv).text();
                                var schools_name = $( "#school_name",theDiv).text();

                                $('#schools_form_id').val(schools_id);
                                $('#schools_form_name').val(schools_name);




                            })

                        }else{
                            //alert("login failed" + response.data)
                        }
                        //  console.log("response",response)
                    }
                });
            });

        })
        $('body').on('click','#navbarCollapse .school_click', function(){
           $(".schools").hide();
           var school_id = $(this).attr("school_id");
            $("." + school_id).show();
        })
        $('#activity_list').on('click', function(){

            $( "#main_test" ).load( "template/activity_list.php", function() {
                //alert( "Load was performed." );

            //-------------------------------------------------get json object and set into clone template button
            var cat = 'activity'
            var schools = {};
            $.ajax({
                url: 'api/list/' + cat,
                dataType: 'jsonp',
                success: function (response) {

                    //clone our template
                    if (response.success == true){
                        var cat = response.data;
                        $.each(cat, function(index,items){
                            var element_name = "school_id_"+items.schools_id;
                            //var school_list_clone_template = $("#clone_activity_template").clone();
                            //console.log("items",items);
                            var clone_template = $("#template").clone();
                            $(clone_template).attr('id',element_name);
                            $(clone_template).addClass(element_name).addClass('schools');
                            $("#user_id", clone_template).text(items.user_id);
                            $("#user_name", clone_template).text(items.user_name);
                            $("#school_name", clone_template).text(items.schools_name);

                            $("#list_name", clone_template).text(items.list_name);
                            $("#img", clone_template).attr('src',$imagePath +items.list_img);
                            $("#clicked", clone_template).text(items.clicked);
                            $("#points", clone_template).text(items.list_points);

                            $(".tab_content").append(clone_template);
                        })
                        $.each(cat, function(index,items){

                             var school_list_clone_template = $("#clone_activity_template").clone();

                            if ($('#activity_list').attr("loaded") != "true" && schools[items.schools_name] != true){
                                var element_name = "school_id_"+items.schools_id;

                                $("#school_list", school_list_clone_template).text(items.schools_name).attr('school_id',element_name).addClass("school_click")
                                $("#activity_tab").append(school_list_clone_template);


                              //  $(school_list_clone_template).addClass(element_name)
                                schools[items.schools_name] = true;


                            }

                        })



                    } else {
                        alert("login failed" + response.data)
                    }
                    //  console.log("response",response)
                    $('#activity_list').attr("loaded",true)
                }
                });
            });
        })



//-------------------------------------------------modal Update button
        $(".members_btn_update").click(function(){
            // console.log("btn_save_active clicked");
            console.log('update button click');

            var member_id= $('#members_form_id').val();
            var member_username= $('#members_username').val();
            var member_password=  $('#members_password').val();
            var schools_id = $('#members_schools_id').val();

            //jquery to update our list
            var member_update= {
                member_id : member_id,
                member_username:member_username,
                member_password:member_password,
                schools_id:schools_id


            }

            console.log("final save",member_update)
            //ajax push to api
            $.ajax({
                url : 'api/memberUpdate/update',
                method  : 'POST',
                data : member_update,
                dataType : 'jsonp',
                success : function(response){
                    alert("Update  Success" + response.data)
                  //  window.location.href = "admin";
                }
            });

        })

//-----------------------------------------------------------------------------ajax Upload------------------------------
        //click admin upload button
        $("#upload").click(function(){

            $.ajax({
                url : "update.php?action=upload_images",
                method : "GET",
                success : function(response){

                    $("#upload_image_div").html(response).css({

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
                        $("#show_upload_image").append(
                            "<img src='images/"+image_name+"' />"

                        ) .css({
                                width : 100,
                                height:80,
                                margin: 'auto'
                            })
                        $("#form_img").val(
                            image_name
                        )

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
            }); event.preventDefault();
        });
//-----------------------------------------------------------------------------ajax Upload------------------------------
        //click admin upload button
        $("#upload_sound").click(function(){

            $.ajax({
                url : "update.php?action=upload_mp3",
                method : "GET",
                success : function(response){

                    $("#upload_mp3_div").html(response).css({

                        margin: 'auto'
                    })
                }
            })

        })

        //click upload button
        $(document).on("click","#uploaded #sound_upload_button",function(){
            //create file form post data
            var formData = new FormData();
            var sound = $("#file")[0].files[0];

            if (typeof image == "undefined"){
                alert("Please select image to upload");
                return;
            }

            formData.append("file", image);

            $.ajax({
                url: "update.php?action=upload_mp3",  //Server script to process data
                type: "POST",
                success: function(response){
                    console.log(response)
                    if (/Uploaded/.test(response)){

                        //reset file so new upload
                        $("#file").val("");
                        var sound_name = sound.name;

                        $("#form_sound").val(
                            sound_name
                        )

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
            });event.preventDefault();
        });


    })
//---------------------------------------------------------------------schools Ajax Add, Update, Delete---------


    $(".schools_btn_add_new").click(function(){
        var schools_id = $('#schools_form_id').val();
        var schools_name= $('#schools_form_name').val();

        //jquery to update our list
        var schools_add_new = {

            schools_id:schools_id,
            schools_name:schools_name

        }

        $.ajax({
            url : 'api/schoolsUpdate/addNewSchools',
            method  : 'POST',
            data : schools_add_new,
            dataType : 'jsonp',
            success : function(response){
                alert("Add new Schools Success" + response.data)
                window.location.href = "admin";
            }
        });

    })
    //-------------------------------------------------modal delete button
    $(".schools_btn_delete").click(function(){
        var schools_id= $('#schools_form_id').val();

        //jquery to update our list
        var schools_delete = {
            schools_id : schools_id
        }

        //ajax push to api
        $.ajax({
            url : 'api/schoolsUpdate/deleteSchools',
            method  : 'POST',
            data : schools_delete,
            dataType : 'jsonp',
            success : function(response){
                alert("Schools has been Deleted" + response.data)
                window.location.href = "admin";
            }
        });
    })
    //-------------------------------------------------modal Update button
    $(".schools_btn_update").click(function(){
        // console.log("btn_save_active clicked");

        var schools_id = $('#schools_form_id').val();
        var schools_name= $('#schools_form_name').val();

        //jquery to update our list
        var schools_update= {
            schools_id:schools_id,
            schools_name:schools_name
        }
        console.log(schools_update)
        //ajax push to api
        $.ajax({
            url : 'api/schoolsUpdate/updateSchools',
            method  : 'POST',
            data : schools_update,
            dataType : 'jsonp',
            success : function(response){
                alert("Update  Success" + response.data)
                window.location.href = "admin";
            }
        });

    })


</script>
