<?php


?>

<!--------------------------------------------Members Panel--------------------------------------------->
<div id="members_panel" class="tab-pane ">
    </br>
    <button id="btn_add_member" data-toggle="modal" data-target="#myModalMembers" class="btn btn-success pull-left">Add Member</button>

    </br> </br> </br>
    <ul id="template_members_header" class="nav ">
        <li class="col-lg-2" ><h3>NO/ID</h3></li>
        <li class="col-lg-3" > <h3>Username</h3></li>
        <li class="col-lg-3" > <h3>Password</h3></li>
        <li class="col-lg-2" ><h3>School Name</h3></li>

        <li class="col-lg-2" id=""><h3>Options</h3></li>
    </ul>



    <div class="tab_content_members">
        <div class="birdListView " style="display:none;">
            <ul  class="nav list_template" id="template_members">
                <li class="col-lg-2" id="members_id" ></li>
                <li class="col-lg-3" id="username"></li>
                <li class="col-lg-3" id="password"></li>
                <li class="col-lg-2" id="school_name"></li>

                <li class="col-lg-2">
                    <button type="button" class="btn btn-primary btn_members_option" data-toggle="modal" data-target="#myModalMembers" data-title="More Option">More Option</button>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    //-------------------------------------------------modal Add New list
    $('#btn_add_member').on('click', function () {

        $('.members_btn_delete').hide();
        $('.members_btn_update').hide();
        $('.members_btn_add_new').show();

    });
    $(".members_btn_add_new").click(function(){


        var member_id = $('#members_form_id').val();
        var member_username= $('#members_username').val();
        var member_password=  $('#members_password').val();
       // var member_mobile = $('#members_mobile').val();
        var school_name = $('#school_name').val();
        //jquery to update our list
        var member_add_new = {
            member_id:member_id,
            member_username:member_username,
            member_password:member_password,
            school_name:school_name

        }
        //console.log("final save",items_active)
        //ajax push to api
        $.ajax({
            url : 'api/memberUpdate/addNewMember',
            method  : 'POST',
            data : member_add_new,
            dataType : 'jsonp',
            success : function(response){
                alert("Add new Member Success" + response.data)
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
                    $("#school_name", clone_template).text(items.school_name);
                    $("#type_admin", clone_template).text(items.type_admin);
                    $(".btn_members_option", clone_template).attr('members_id_add',+ items.id);
                    $(".tab_content_members").append(clone_template);
                })

                $('.btn_members_option').on('click',function(){


                    $(".members_btn_add_new").hide();
                    $('.members_btn_delete').show();
                    $('.members_btn_update').show();
                    //$("#members_form_id").prop('disabled', true);
                    var btn_option_id =  $(this).attr("members_id_add");
                    console.log('members_id_'+btn_option_id);
                    var theDiv = $('#members_id_'+btn_option_id);
                    var members_id = $( "#members_id",theDiv).text();
                    var members_name = $( "#username",theDiv).text();
                    var members_password = $('#password', theDiv).text();
                    var members_school = $( "#school_name",theDiv).text();
                    var type_admin = $( "#type_admin",theDiv).text();

                    $('#members_form_id').val(members_id);
                    $('#members_username').val(members_name);
                    $('#members_password').val(members_password);
                    $('#members_school_name').val(members_school);
                    $('#type_admin').val(type_admin);
                    console.log("response",members_school_name)

                })

            }else{
                //alert("login failed" + response.data)
            }
            //  console.log("response",response)
        }
    });


</script>
