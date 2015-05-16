
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
        <ul class="nav nav-pills nav-stacked" id="myTab">
            <li class="admin_panel"><a data-toggle="tab"  id="list_view" href="#">Admin Panel</a></li>
            <li class="members_panel"><a data-toggle="tab" id="members" href="#">Member Panel</a></li>


            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">School Activities<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a data-toggle="tab" href="#upload_image" id="">Upload</a></li>
                    <li><a data-toggle="tab" href="#dropdown2">Activities 2</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!----------------------------------admin right-------------------------->
    <div class="col-lg-10 col-md-10 main_admin_right " id="main_test">




            <div id="upload_image" class="tab-pane fade">
                <h3>Upload Image</h3>

            </div>
            <div id="dropdown2" class="tab-pane fade">
                <h3>Activities View 2</h3>
                <p>WInteger convallis, nulla in sollicitudin placerat, ligula enim auctor lectus, in mollis diam dolor at lorem.
                Sed bibendum nibh sit amet dictum feugiat. Vivamus arcu sem, cursus a feugiat ut, iaculis at erat. Donec vehicula at ligula vitae venenatis.
                 Sed nunc nulla, vehicula non porttitor in, pharetra et dolor. Fusce nec velit velit. Pellentesque consectetur eros.</p>
            </div>

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

                                                      <option value="other">mammals</option>

                                                      <option value="others">Other</option>

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
                                            <button class="btn btn-primary  pull-right"><a data-toggle="tab" href="#" id="upload_sound">Upload Mp3</a></button>
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
                                                <input type="text" class="form-control" id="members_username" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Password:</label>
                                                <input type="text" class="form-control" id="members_password" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="number" class="control-label">Mobile Number:</label>
                                                <input type="text" class="form-control" id="members_mobile">
                                            </div>
                                             <div class="form-group">
                                                <label for="admin" class="control-label">Admin or Member:</label>
                                                <input type="text" class="form-control" id="type_admin">
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

        $("#members_form_id").prop('disabled', true);
        $("input[name = '1']").attr('checked' , true);

        $('#list_view').on('click', function(){
            $( "#main_test" ).load( "template/list_view.php", function() {
                //alert( "Load was performed." );
            });


        })
        $('#members').on('click', function(){
            $( "#main_test" ).load( "template/member_panel.php", function() {
                //alert( "Load was performed." );
            });
        })



//-------------------------------------------------modal Update button
        $(".members_btn_update").click(function(){
            // console.log("btn_save_active clicked");
            console.log('update button click');

            var member_id= $('#members_form_id').val();
            var member_username= $('#members_username').val();
            var member_password=  $('#members_password').val();
            var member_mobile = $('#members_mobile').val();
            var type_admin = $('#type_admin').val();



            //jquery to update our list
            var member_update= {
                member_id : member_id,
                member_username:member_username,
                member_password:member_password,
                member_mobile:member_mobile,
                type_admin:type_admin

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
                    window.location.href = "admin";
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
            });  event.preventDefault();
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
        }); event.preventDefault();
    })


</script>
