<?php
/**
 * Created by PhpStorm.
 * User: yar
 * Date: 11/05/2015
 * Time: 1:48 AM
 */
?>
<!--------------------------------------------list Panel--------------------------------------------->
<div id="admin_panel" class=" ">
    </br>
    <button id="btn_de_active" class="btn btn-danger pull-right">DEACTIVATE</button>
    <button id="btn_save_active_1" class="btn btn-warning pull-right">ACTIVATE</button>
    <button id="btn_add_new" data-toggle="modal" data-target="#myModal" class="btn btn-success pull-left">Add New</button>


    </br> </br> </br>
    <ul id="template_header" class="nav ">
        <li class="col-lg-1" ><h3>NO#</h3></li>
        <li class="col-lg-1" > <h3>Name</h3></li>
        <li class="col-lg-1" > <h3>Cat</h3></li>
        <li class="col-lg-1" id=""><h3>Classify</h3></li>
        <li class="col-lg-1" ><h3>Image</h3></li>
        <li class="col-lg-1" ><h3>Sound</h3></li>
        <li class="col-lg-3" id=""><h3>Descriptions</h3></li>

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
                <li class="col-lg-1" class="list_type" id="type"></li>
                <li class="col-lg-1 template_img" ><img id="img" class="btn_option" src=""/></li>
                <li class="col-lg-1"  >  <audio id="sound" src="" type="audio/mp3" controls="controls"></audio></li>
                <li class="col-lg-3" id="description"></li>
                <li class="col-lg-1" id="points"></li>
                <li class="col-lg-1 "><input class="active active_checkbox" name=""   type="checkbox" id="cat_active" ></li>
                <li class="col-lg-1 ">
                    <button type="button" class="btn btn-primary btn_option" data-toggle="modal" data-target="#myModal" data-title="More Option">More Option</button>
                </li>
            </ul>
        </div>
    </div>
</div>


<script>

        //-----------------------------------------Un-active the check box if it is active--------------------------//
        $('#btn_add_new').on('click', function () {
            $('.list_btn_delete').hide();
            $('.list_btn_update').hide();
            $('.list_btn_add_new').show();
            $('#form_id').val('');
            $('#form_name').val('');
            $('#form_cat').val('');
            $('#form_type').val('');
            $('#form_img').val('');
            $('#form_sound').val('');
            $('#form_points').val('');
            $('#desc_text').val('');

        });


    //-------------------------------------------------Save the active check boc
        $("#btn_save_active_1").click(function(){
        // console.log("btn_save_active clicked");

        var items_active = [];
        $active = $(".active:checked");

        $.each($active,function(index,item){
            var id = $(this).attr("list_view_id")
            items_active.push(id);
        });
            console.log("items_active",items_active);
        //jquery to update our list
        var list = {
            items : items_active
        }
        console.log("final save",items_active)
        console.log("final save",list)
        //ajax push to api
        $.ajax({
            url : 'api/update/active',
            method  : 'POST',
            data : list,
            dataType : 'jsonp',
            success : function(response){
                alert("List activation Success" );
                //window.location.href = "admin";
            }
        });

    })
        //-------------------------------------------------button de activate
        $("#btn_de_active").on('click', function () {

            var items_active = [];

            $active = $("[checked = checked]");

            $.each($active, function (index, item) {
                var id = $(this).attr("name")
                items_active.push(id);
            })
            var list = {
                items: items_active
            }
            console.log(list);
            $.ajax({
                url: 'api/update/unactive',
                method: 'POST',
                data: list,
                dataType: 'jsonp',
                success: function (response) {
                    alert("List de activation Success");
                    window.location.href = "admin";
                }
            });

        });
        //-------------------------------------------------modal Add New list
        $(".list_btn_add_new").click(function (e) {
            // console.log("btn_save_active clicked");
            //console.log('update button click');
            // var items_id = $('#form_id').val();
            var items_name = $('#form_name').val();
            var items_cat = $('#form_cat').val();
            var items_type = $("#form_type").val();
            var items_img = $('#form_img').val();
            var items_sound = $('#form_sound').val();
            var items_points = $('#form_points').val();
            var items_desc = $('#desc_text').val();


            //jquery to update our list
            var list_add_new = {
                // list_id : items_id,
                list_name: items_name,
                list_cat: items_cat,
                list_type:items_type,
                list_img: items_img,
                list_sound: items_sound,
                list_points: items_points,
                list_desc: items_desc
            }
            //console.log("final save",items_active)
            //ajax push to api
            $.ajax({
                url: 'api/update/addNew',
                method: 'POST',
                data: list_add_new,
                dataType: 'jsonp',
                success: function (response) {
                    //console.log("response",response)
                    alert("Add Success" + response.data)
                    window.location.href = "admin";
                }
            });

            e.preventDefault();
        })
        //-------------------------------------------------modal Update button
        $(".list_btn_update").click(function () {
            // console.log("btn_save_active clicked");
            //  console.log('update button click');
            var items_id = $('#form_id').val();
            var items_cat = $('#form_cat').val();
            var items_type = $('#form_type').val();
            var items_name = $('#form_name').val();
            var items_img = $('#form_img').val();
            var items_sound = $('#form_sound').val();
            var items_points = $('#form_points').val();
            var items_desc = $('#desc_text').val();

            //jquery to update our list
            var list_update = {
                list_id: items_id,
                list_cat: items_cat,
                list_type: items_type,
                list_name: items_name,
                list_img: items_img,
                list_sound: items_sound,
                list_points: items_points,
                list_desc: items_desc
            }

            //ajax push to api
            $.ajax({
                url: 'api/update/update',
                method: 'POST',
                data: list_update,
                dataType: 'jsonp',
                success: function (response) {
                    alert("Update  Success" + response.data)
                    window.location.href = "admin";
                }
            });

        })
        //-------------------------------------------------modal delete button
        $(".list_btn_delete").click(function () {
            var items_id = $('#form_id').val();

            //jquery to update our list
            var list_delete = {
                list_id: items_id

            }
            //console.log("final save",items_active)
            //ajax push to api
            $.ajax({
                url: 'api/update/delete',
                method: 'POST',
                data: list_delete,
                dataType: 'jsonp',
                success: function (response) {
                    alert("Deleted" + response.data)
                    window.location.href = "admin";
                }
            });

        })
        //-------------------------------------------------get json object and set into clone template button

        var cat = 'all';
        $.ajax({
            url: 'api/list/' + cat,
            dataType: 'jsonp',
            success: function (response) {
                //clone our template


                if (response.success == true){
                    var cat = response.data;


                    $.each(cat, function(index,items){
                        var element_name = "list_id_"+items.list_id;
                        //console.log("items",items);
                        var clone_template = $("#template").clone();
                        $(clone_template).attr('id',element_name);
                        $("#id", clone_template).text(items.list_id);
                        $("#cat", clone_template).text(items.list_cat);
                        $("#type", clone_template).text(items.list_type);
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

                        $(".active", clone_template).attr('list_view_id',+ items.list_id);
                        $(".btn_option", clone_template).attr('list_view_id',+ items.list_id);


                        $("#img", clone_template).attr('src',$imagePath +items.list_img);
                        $("#sound", clone_template).attr('src',$soundPath +items.list_sound);
                        $("#description", clone_template).text(items.list_desc);
                        $(".tab_content").append(clone_template);

                    })

                    $('.btn_option').on('click', function () {

                        //$('#admin_panel').removeClass("active_zz");
                        //$('#myModal').addClass('active_z');
                        $(".list_btn_add_new").hide();
                        $('.list_btn_delete').show();
                        $('.list_btn_update').show();
                        // $("#form_cat").prop('disabled', true);
                        var btn_id = $(this).attr("list_view_id");
                        var theDiv = $('#list_id_' + btn_id);
                        var list_name = $("#name", theDiv).text();
                        var list_cat = $("#cat", theDiv).text();
                        var list_type = $("#type", theDiv).text();
                        var list_img = $("#img", theDiv).attr('src').replace($imagePath, "");
                        var list_sound = $("#sound", theDiv).attr('src').replace($soundPath, "");
                        var list_desc = $("#description", theDiv).text();
                        var list_points = $("#points", theDiv).text();
                        console.log("cat_type", list_cat)


                        $('#form_id').val(btn_id);
                        $('#form_name').val(list_name);
                        $('#form_cat').val(list_cat);
                        $('#form_type').val(list_type);
                        $('#form_img').val(list_img);
                        $('#form_sound').val(list_sound);
                        $('#form_points').val(list_points);
                        $('#desc_text').val(list_desc);
                    })

                } else {
                    alert("login failed" + response.data)
                }
                //  console.log("response",response)
            }
        });

</script>