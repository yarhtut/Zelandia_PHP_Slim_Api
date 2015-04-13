
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
    <div id="navbarCollapse" class= " col-lg-3 col-md-3 admin_panel_left">
        <ul class="nav nav-pills nav-stacked" id="myTab">
            <li class="admin_panel"><a data-toggle="tab"  href="#admin_panel">Admin Panel</a></li>
            <li class="members_panel"><a data-toggle="tab" href="#members_panel">Member Panel</a></li>

            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">School Activities<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a data-toggle="tab" href="#dropdown1">Activities 1</a></li>
                    <li><a data-toggle="tab" href="#dropdown2">Activities 2</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!----------------------------------admin right-------------------------->
    <div class="col-lg-9 col-md-9 main_admin_right ">

        <div id="admin_panel" class="fade admin_panel ">
                    </br>
                    <button id="btn_de_active" class="btn btn-danger pull-right">DEACTIVATE</button>
                    <button id="btn_save_active" class="btn btn-warning pull-right">ACTIVATE</button>
                    <button id="btn_add_new" data-toggle="modal" data-target="#myModal" class="btn btn-success pull-left">Add New</button>

                      <!-- <button data-toggle="modal" data-target="#myModal" class="btn btn-primary btn_option">More Option</button>
                                  Modal HTML -->
                    </br> </br> </br>
                  <ul id="template_header" class="nav ">
                            <li class="col-lg-1" ><h3>NO#</h3></li>
                            <li class="col-lg-1" > <h3>Name</h3></li>
                            <li class="col-lg-1" > <h3>Cat</h3></li>
                            <li class="col-lg-1" ><h3>Image</h3></li>
                            <li class="col-lg-1" ><h3>Sound</h3></li>
                            <li class="col-lg-4" id=""><h3>Descriptions</h3></li>
                            <li class="col-lg-1" id=""><h3>Points</h3></li>
                            <li class="col-lg-1" id=""><h3>Active</h3></li>
                            <li class="col-lg-1" id=""><h3>Options</h3></li>
                  </ul>



            <div class="tab_content">
                     <div class="birdListView" style="display: none">
                           <ul  class="nav list_template " id="template">
                                <li class="col-lg-1" id="id" ></li>
                                <li class="col-lg-1" class="list_name" id="name"></li>
                                <li class="col-lg-1" class="list_cat" id="cat"></li>
                                <li class="col-lg-1 template_img" ><img id="img" class="btn_option" src=""/></li>
                                <li class="col-lg-1"  >  <audio id="sound" src="" type="audio/mp3" controls="controls"></audio></li>
                                <li class="col-lg-4" id="description"></li>
                                <li class="col-lg-1" id="points"></li>
                                <li class="col-lg-1 "><input class="active active_checkbox" name=""   type="checkbox" id="cat_active" ></li>
                                <li class="col-lg-1 ">
                                <button type="button" class="btn btn-primary btn_option" data-toggle="modal" data-target="#myModal" data-title="More Option">More Option</button>
                                </li>
                           </ul>
                     </div>
            </div>
</div>
            <div id="members_panel" class="tab-pane fade">
                </br>
                  <button id="btn_add_member" data-toggle="modal" data-target="#myModalMembers" class="btn btn-success pull-left">Add Member</button>
                   <!--   <button id="btn_de_active" class="btn btn-danger pull-right">DEACTIVATE</button>
                    <button id="btn_save_active" class="btn btn-warning pull-right">ACTIVATE</button>
                    <button id="btn_add_new" data-toggle="modal" data-target="#myModal" class="btn btn-success pull-left">Add New</button>

                     <button data-toggle="modal" data-target="#myModal" class="btn btn-primary btn_option">More Option</button>
                                  Modal HTML -->
                    </br> </br> </br>
                  <ul id="template_members_header" class="nav ">
                            <li class="col-lg-2" ><h3>NO/ID</h3></li>
                            <li class="col-lg-3" > <h3>Username</h3></li>
                            <li class="col-lg-3" > <h3>Password</h3></li>
                            <li class="col-lg-2" ><h3>Mobile Number</h3></li>
                            <li class="col-lg-2" id=""><h3>Options</h3></li>
                  </ul>



            <div class="tab_content_members">
                     <div class="birdListView " style="display:none;">
                           <ul  class="nav list_template" id="template_members">
                                <li class="col-lg-2" id="members_id" ></li>
                                <li class="col-lg-3" id="username"></li>
                                <li class="col-lg-3" id="password"></li>
                                <li class="col-lg-2" id="mobile_number"></li>
                                <li class="col-lg-2">
                                <button type="button" class="btn btn-primary btn_members_option" data-toggle="modal" data-target="#myModalMembers" data-title="More Option">More Option</button>
                                </li>
                           </ul>
                     </div>
            </div>
            </div>
            <div id="dropdown1" class="tab-pane fade">
                <h3>Activities View 1</h3>
                <p>WInteger convallis, nulla in sollicitudin placerat, ligula enim auctor lectus, in mollis diam dolor at lorem.
                 Sed bibendum nibh sit amet dictum feugiat. Vivamus arcu sem, cursus a feugiat ut, iaculis at erat. Donec vehicula at ligula vitae venenatis.
                  Sed nunc nulla, vehicula non porttitor in, pharetra et dolor. Fusce nec velit velit. Pellentesque consectetur eros.</p>
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
                                                <label for="catagories" class="control-label">Catagories:</label>
                                                <input type="text" class="form-control" id="form_cat" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="control-label">Name:</label>
                                                <input type="text" class="form-control" id="form_name" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="Image" class="control-label">Images:</label>
                                                <input type="text" class="form-control" id="form_img">
                                            </div>
                                            <div class="form-group">
                                                <label for="sound" class="control-label">Sound:</label>
                                                <input type="text" class="form-control" id="form_sound">
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
                                                <label for="Image" class="control-label">Mobile Number:</label>
                                                <input type="text" class="form-control" id="members_mobile">
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
        $("#form_cat").prop('disabled', true);
        $("#members_form_id").prop('disabled', true);
        $("input[name = '1']").attr('checked' , true);

       $('.admin_panel').on('click', function(){
           $('#members_panel').removeClass('active_z');
            $('#admin_panel').addClass('active_z');
        })
        $('.members_panel').on('click', function(){
            $('#admin_panel').removeClass('active_z');
            $('#members_panel').addClass('active_z');

        })

//-----------------------------------------Un-active the check box if it is active--------------------------//
        $('#btn_add_new').on('click', function(){
            $('.list_btn_delete').hide();
            $('.list_btn_update').hide();
            $('.list_btn_add_new').show();
            $('#form_id').val('');
            $('#form_name').val('');
            $('#form_cat').val('');
            $('#form_img').val('');
            $('#form_sound').val('');
            $('#form_points').val('');
            $('#desc_text').val('');
            $("#form_cat").prop('disabled', false);
        });
//-----------------------------------------Un-active the check box if it is active--------------------------//
        $('#btn_add_member').on('click', function(){
            $('.members_btn_delete').hide();
            $('.members_btn_update').hide();
            $('.members_btn_add_new').show();
            console.log('btn_add_member clicked')

            $('#members_form_id').val('');
            $('#members_username').val('');
            $('#members_password').val('');
            $('#members_mobile').val('');

        });
//-------------------------------------------------button de activate
        $("#btn_de_active").on('click', function () {

            var items_active = [];

            $active =$("[checked = checked]");

            $.each($active,function(index,item){
                var id = $(this).attr("value")
                items_active.push(id);
            })
            var list = {
                items : items_active
            }
            console.log(list);
            $.ajax({
                url : 'api/update/unactive',
                method  : 'POST',
                data : list,
                dataType : 'jsonp',
                success : function(response){
                    alert("List de activation Success" );
                    window.location.href = "admin";
                }
            });

        });
//-------------------------------------------------Save the active check boc
        $("#btn_save_active").click(function(){
            // console.log("btn_save_active clicked");

            var items_active = [];
            $active = $(".active :checked");

            $.each($active,function(index,item){
                var id = $(this).attr("list_view_id")
                items_active.push(id);
            })


            //jquery to update our list
            var list = {
                items : items_active
            }
            //console.log("final save",items_active)
            //ajax push to api
            $.ajax({
                url : 'api/update/active',
                method  : 'POST',
                data : list,
                dataType : 'jsonp',
                success : function(response){
                    alert("List activation Success" );
                    window.location.href = "admin";
                }
            });

        })
//-------------------------------------------------modal Add New list
        $(".list_btn_add_new").click(function(){
            // console.log("btn_save_active clicked");
            //console.log('update button click');
            // var items_id = $('#form_id').val();
            var items_name= $('#form_name').val();
            var items_cat= $('#form_cat').val();
            var items_img=  $('#form_img').val();
            var items_sound = $('#form_sound').val();
            var items_points = $('#form_points').val();
            var items_desc = $('#desc_text').val();


            //jquery to update our list
            var list_add_new = {
                // list_id : items_id,
                list_name: items_name,
                list_cat: items_cat,
                list_img : items_img,
                list_sound: items_sound,
                list_points: items_points,
                list_desc: items_desc
            }
            //console.log("final save",items_active)
            //ajax push to api
            $.ajax({
                url : 'api/update/addNew',
                method  : 'POST',
                data : list_add_new,
                dataType : 'jsonp',
                success : function(response){
                    alert("Add Success" + response.data)
                    window.location.href = "admin";
                }
            });

        })
//-------------------------------------------------modal Update button
        $(".list_btn_update").click(function(){
            // console.log("btn_save_active clicked");
            //console.log('update button click');
            var items_id = $('#form_id').val();
            var items_name= $('#form_name').val();
            var items_img=  $('#form_img').val();
            var items_sound = $('#form_sound').val();
            var items_points = $('#form_points').val();
            var items_desc = $('#desc_text').val();

            //jquery to update our list
            var list_update = {
                list_id : items_id,
                list_name: items_name,
                list_img : items_img,
                list_sound: items_sound,
                list_points: items_points,
                list_desc: items_desc
            }
            //console.log("final save",items_active)
            //ajax push to api
            $.ajax({
                url : 'api/update/update',
                method  : 'POST',
                data : list_update,
                dataType : 'jsonp',
                success : function(response){
                    alert("Update  Success" + response.data)
                    window.location.href = "admin";
                }
            });

        })
//-------------------------------------------------modal delete button
        $(".list_btn_delete").click(function(){
            var items_id = $('#form_id').val();

            //jquery to update our list
            var list_delete = {
                list_id : items_id

            }
            //console.log("final save",items_active)
            //ajax push to api
            $.ajax({
                url : 'api/update/delete',
                method  : 'POST',
                data : list_delete,
                dataType : 'jsonp',
                success : function(response){
                    alert("Deleted" + response.data)
                    window.location.href = "admin";
                }
            });

        })
//-------------------------------------------------modal Add New list
        $(".members_btn_add_new").click(function(){
            // console.log("btn_save_active clicked");
            //console.log('update button click');
            // var items_id = $('#form_id').val();

            var member_id = $('#members_form_id').val();
            var member_username= $('#members_username').val();
            var member_password=  $('#members_password').val();
            var member_mobile = $('#members_mobile').val();



            //jquery to update our list
            var member_add_new = {
                member_id:member_id,
                member_username:member_username,
                member_password:member_password,
                member_mobile:member_mobile

            }
            //console.log("final save",items_active)
            //ajax push to api
            $.ajax({
                url : 'api/memberUpdate/addNewMember',
                method  : 'POST',
                data : member_add_new,
                dataType : 'jsonp',
                success : function(response){
                    alert("Add new Member Successed" + response.data)
                    window.location.href = "admin";
                }
            });

        })
//-------------------------------------------------modal delete button
        $(".members_btn_delete").click(function(){
            var member_id= $('#members_form_id').val();

            //jquery to update our list
            var member_delete = {
               member_id : member_id

            }

            console.log("final save",member_delete)
            //ajax push to api
            $.ajax({
                url : 'api/memberUpdate/delete',
                method  : 'POST',
                data : member_delete,
                dataType : 'jsonp',
                success : function(response){
                    alert("Members has been Deleted" + response.data)
                    window.location.href = "admin";
                }
            });

        })
//-------------------------------------------------modal Update button
        $(".members_btn_update").click(function(){
            // console.log("btn_save_active clicked");
            //console.log('update button click');

            var member_username= $('#members_username').val();
            var member_password=  $('#members_password').val();
            var member_mobile = $('#members_mobile').val();



            //jquery to update our list
            var member_update= {
                member_username:member_username,
                member_password:member_password,
                member_mobile:member_mobile

            }
            //console.log("final save",items_active)
            //ajax push to api
            $.ajax({
                url : 'api/memberUpdate/update',
                method  : 'POST',
                data : member_update,
                dataType : 'jsonp',
                success : function(response){
                    alert("Update had Successed" )
                    window.location.href = "admin";
                }
            });

        })

//-------------------------------------------------get json object and set into clone template button

        var cat = 'bird';
        $.ajax({
            url : 'api/list/'+cat,
            dataType : 'jsonp',
            success : function(response){
                //clone our template


                if (response.success == true){
                    var cat = response.data;
                    // console.log("cat",response.data)

                    $.each(cat, function(index,items){
                        var element_name = "list_id_"+items.list_id;
                        //console.log("items",items);

                        var clone_template = $("#template").clone();

                        $(clone_template).attr('id',element_name);


                        $("#id", clone_template).text(items.list_id);
                        $("#cat", clone_template).text(items.list_cat);
                        $("#name", clone_template).text(items.list_name);

                        $("#points", clone_template).text(items.list_points);


                        // database value 1 to name if name is 1 then checked true

                        $(".active", clone_template).attr('name',+ items.list_active);
                        console.log("items.list_active",items.list_active)
                        var isActive = (items.list_active == 1) ? true : false;

                        console.log("isActive",isActive)

                        if (isActive == true)
                            $(".active_checkbox", clone_template).attr('checked' , true);
                        //element_name


                        //value for check or not check id parse
                        $(".active", clone_template).attr('value',+ items.list_id);

                        //$(").text( items.active == 1)? $(this).prop("checked") : $(this).prop("unchecked") ;

                        $(".active", clone_template).attr('list_view_id',+ items.list_id);
                        $(".btn_option", clone_template).attr('list_view_id',+ items.list_id);


                        $("#img", clone_template).attr('src',$imagePath +items.list_img);
                        $("#sound", clone_template).attr('src',$soundPath +items.list_sound);
                        $("#description", clone_template).text(items.list_desc);
                        $(".tab_content").append(clone_template);

                    })

                    $('.btn_option').on('click',function(){

                        //$('#admin_panel').removeClass("active_zz");
                        //$('#myModal').addClass('active_z');
                        $(".list_btn_add_new").hide();
                        $('.list_btn_delete').show();
                        $('.list_btn_update').show();
                        $("#form_cat").prop('disabled', true);
                        var btn_id =  $(this).attr("list_view_id");
                        var theDiv = $('#list_id_'+btn_id);
                        var list_name = $( "#name",theDiv).text();
                        var list_cat = $( "#cat",theDiv).text();
                        var list_img = $( "#img",theDiv).attr('src').replace($imagePath,"");
                        var list_sound = $( "#sound",theDiv).attr('src').replace($soundPath,"");
                        var list_desc = $( "#description",theDiv).text();
                        var list_points = $( "#points",theDiv).text();


                        $('#form_id').val(btn_id);
                        $('#form_name').val(list_name);
                        $('#form_cat').val(list_cat);
                        $('#form_img').val(list_img);
                        $('#form_sound').val(list_sound);
                        $('#form_points').val(list_points);
                        $('#desc_text').val(list_desc);
                    })

                }else{
                    alert("login failed" + response.data)
                }
                //  console.log("response",response)
            }
        });
//-------------------------------------------------get json object and set into clone template button-----------------
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
                        $(clone_template).attr('id',"members_id_"+items.id);
                        $("#members_id", clone_template).text(items.id);
                        $("#username", clone_template).text(items.user_name);
                        $("#password", clone_template).text(items.pass_word);
                        $("#mobile_number", clone_template).text(items.cellnumber);
                        $(".btn_members_option", clone_template).attr('members_id_add',+ items.id);
                        $(".tab_content_members").append(clone_template);
                    })

                    $('.btn_members_option').on('click',function(){


                        $(".members_btn_add_new").hide();
                        $('.members_btn_delete').show();
                        $('.members_btn_update').show();
                      //  $("#members_form_id").prop('disabled', true);
                        var btn_option_id =  $(this).attr("members_id_add");
                        console.log('members_id_'+btn_option_id);
                        var theDiv = $('#members_id_'+btn_option_id);
                        var members_id = $( "#members_id",theDiv).text();
                        var members_name = $( "#username",theDiv).text();
                        var members_password = $('#password', theDiv).text();
                        var members_mobile = $( "#mobile_number",theDiv).text();

                        $('#members_form_id').val(members_id);
                        $('#members_username').val(members_name);
                        $('#members_password').val(members_password);
                        $('#members_mobile').val(members_mobile);

                    })

                }else{
                    //alert("login failed" + response.data)
                }
                //  console.log("response",response)
            }
        });
    })

</script>
