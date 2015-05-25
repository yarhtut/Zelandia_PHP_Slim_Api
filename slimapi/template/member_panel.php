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
                <li class="col-lg-2" id="schools_id" style="display:none;"></li>
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
        var schools_id = $('#members_schools_id').val();
        //jquery to update our list
        var member_add_new = {
            member_id:member_id,
            member_username:member_username,
            member_password:member_password,
            schools_id:schools_id

        }

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





</script>
