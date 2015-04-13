
<div class="container">

    <div class="page-header">
        <h1>Sanctuary <small>Bootstrap template, demonstrating an example portfolio page layout</small></h1>
    </div>

    <div class="page-header-menu">
        <div class="bs-example">

            <ul class="nav nav-tabs" id="myTab">
                <li><a data-toggle="tab" href="#section_birds" id="all">All</a></li>
                <li><a data-toggle="tab" href="#section_birds" id="section_birds">BIRDS</a></li>
                <li><a data-toggle="tab" href="#section_plants"  id="section_plants">PLANTS</a></li>
                <li><a data-toggle="tab" href="#section_inserts"  id="section_inserts">INSERTS</a></li>
            </ul>


            <div class="container tab-content birdListView sanctuary_view " id="birdListView">
                  <div class="  " style="display:none">
                       <div  id="template" class=" col-lg-3 col-md-3 main_json_object">
                                <div class="json_object_wrapper ">
                                    <div class="json_object_header">
                                        <h6 id="sound" class="fa fa-file-sound-o pull-right"></h6>
                                        <h3 id="name"></h3>
                                    </div>
                                    <a href="#">
                                        <img id="img_sanctuary" class="img-responsive section-images" alt="Bootstrap template" src="" />
                                    </a>
                                </div>
                                <div class="">
                                    <div class="section-text-wrapper">
                                        <h4 id="cat"></h4>
                                        <h1 class="pull-right" id="points"></h1>
                                        <p id="description"></p>
                                        <div class="text-center">
                                            <a href="#"><span class="glyphicon glyphicon-thumbs-up"></span> Vote Up</a>
                                            <a href="#"><span class="glyphicon glyphicon-thumbs-down"></span> Vote Down</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="break_list"/>
                       </div>
                  </div>
            </div>
            <!--------------------------------------------------------Plants------------------------------------------>
            <div class="container tab-content-plants  plantListView sanctuary_view "  id="plantListView">
            <div class="" style="display:none" >
                <h1>Insects</h1>
             <div  id="template_plants" class=" col-lg-3 col-md-3 main_json_object ">

                    <div class="json_object_wrapper ">
                        <div class="json_object_header">
                            <h1 class="pull-right" id="points_plants"></h1>
                            <h6 id="sound" class="fa fa-file-sound-o pull-right"></h6>
                            <h3 id="name_plants"></h3>
                        </div>
                        <a href="#">
                            <img id="img_sanctuary_plants" class="img-responsive section-images" alt="Bootstrap template" src="" />
                        </a>
                    </div>
                    <div class="">
                        <div class="section-text-wrapper">

                            <h4 id="cat_plants"></h4>

                            <p id="description_plants"></p>

                            <div class="text-center">
                                <a href="#"><span class="glyphicon glyphicon-thumbs-up"></span> Vote Up</a>
                                <a href="#"><span class="glyphicon glyphicon-thumbs-down"></span> Vote Down</a>
                            </div>
                        </div>
                    </div>
                    <div class="break_list"/>
                </div>
            </div>
            </div>
            <!--------------------------------------------------------Insects------------------------------------------>

            <div class="container tab-content-insects  insectListView sanctuary_view " id="insectListView">
                <h1>Insects</h1>
                <div class=" " style="display:none" >

                  <div  id="template_insects" class=" col-lg-3 col-md-3 main_json_object">
                        <div class="json_object_wrapper ">
                            <div class="json_object_header">
                                <h6 id="sound_insect" class="fa fa-file-sound-o pull-right"></h6>
                                <h3 id="name_insect"></h3>
                            </div>
                            <a href="#">
                                <img id="img_sanctuary_insect" class="img-responsive section-images" alt="Bootstrap template" src="" />
                            </a>
                        </div>
                        <div class="">
                            <div class="section-text-wrapper">
                                <h4 id="cat"></h4>
                                <h1 class="pull-right" id="points_insect"></h1>
                                <p id="description_insect"></p>
                                <div class="text-center">
                                    <a href="#"><span class="glyphicon glyphicon-thumbs-up"></span> Vote Up</a>
                                    <a href="#"><span class="glyphicon glyphicon-thumbs-down"></span> Vote Down</a>
                                </div>
                            </div>
                        </div>
                        <div class="break_list"/></div>
                </div>
            </div>
</div>

<script>



    $("document").ready(function(){

        $("#section_plants ").click(function(){

            $.ajax({
                url : "include/insects.php",
                method : "GET",
                success : function(response){
                     console.log("respsonse",response)
                    $(".page-header-menu").html(response).css({
                        width : 1100,
                        //height:300,
                        margin: 'auto'
                    })

                }

            })

        })
        $("#section_birds").click(function(){

            $('.sanctuary_view').hide();
            console.log("button 1 clicked")
            $('.sanctuary_view').hide();
            $(".birdListView").show();


        });
       // $("#section_plants").click(function(){
           // console.log("button 2 clicked")
           // $('.sanctuary_view').hide();
          //  $('#template').show();
          //  $('.sanctuary_view').hide();
          //  $('#plantListView').show();
       // });
        $("#section_inserts").click(function(){

            $('.sanctuary_view').hide();
            console.log("button 3 clicked")
            //$('#plantListView').show();
            $(".insectListView").show();


        });

        var cat = 'bird';
        $.ajax({
            url : 'api/list/'+cat,
            dataType : 'jsonp',
            success : function(response){
                //clone our template
               var template = $("#template").clone();

                if (response.success == true){
                    var cat = response.data;
                    // console.log("cat",response.data)
                    $.each(cat, function(index,items){

                        //  console.log("items",items);

                        var clone_template = $("#template").clone();
                        $("#cat", clone_template).text(items.list_cat);
                        $("#name", clone_template).text(items.list_name);
                        $("#points", clone_template).text(items.list_points);
                        $("#img_sanctuary", clone_template).attr('src',$imagePath +items.list_img);
                        $("#sound", clone_template).attr('src',items.list_sound);
                        $("#description", clone_template).text(items.list_desc);
                        // console.log("clone_template",clone_template.html());

                        $(".tab-content").append(clone_template);

                    })


                    }else{
                    alert(" failed" + response.data)
                }
                //  console.log("response",response)
            }
        });
        var cat = 'plants';
        $.ajax({
            url : 'api/list/'+cat,
            dataType : 'jsonp',
            success : function(response){
                //clone our template

                var template_plants = $("#template_plants").clone();

                if (response.success == true){
                    var cat = response.data;
                    // console.log("cat",response.data)
                    $.each(cat, function(index,items){

                        // console.log("items",items);

                        var clone_template_plants = $("#template_plants").clone();
                        $("#cat_plants", clone_template_plants).text(items.list_cat);
                        $("#name_plants", clone_template_plants).text(items.list_name);
                        $("#points_plants", clone_template_plants).text(items.list_points);
                        $("#img_sanctuary_plants", clone_template_plants).attr('src',$imagePath +items.list_img);
                        $("#description_plants", clone_template_plants).text(items.list_desc);
                        // console.log("clone_template",clone_template.html());

                        $(".tab-content-plants").append(clone_template_plants);

                    })

                }else{
                    alert(" failed" + response.data)
                }
                //  console.log("response",response)
            }
        });
        var cat = 'insects';
        $.ajax({
            url : 'api/list/'+cat,
            dataType : 'jsonp',
            success : function(response){
                //clone our template
                var template_insects = $("#template_insects").clone();

                if (response.success == true){
                    var cat = response.data;
                    // console.log("cat",response.data)
                    $.each(cat, function(index,items){

                        //  console.log("items",items);

                        var clone_template = $("#template_insects").clone();

                        $("#name_insect", clone_template).text(items.list_name);
                        $("#points_insect", clone_template).text(items.list_points);
                        $("#img_sanctuary_insect", clone_template).attr('src',$imagePath +items.list_img);
                        $("#sound_insect", clone_template).attr('src',items.list_sound);
                        $("#description_insect", clone_template).text(items.list_desc);
                        // console.log("clone_template",clone_template.html());

                        $(".tab-content-insects").append(clone_template);

                    })

                }else{
                    alert(" failed" + response.data)
                }
                //  console.log("response",response)
            }
        });






    })

</script>

