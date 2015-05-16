
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


            <div class="container tab-content sanctuary_view ">
                  <div class="  " style="display:none">

                       <div  id="template" class="col-lg-3 col-md-3 section_all">
                                <div class="json_object_wrapper ">
                                    <div class="json_object_header">
                                        <h6 id="sound" class="fa fa-file-sound-o pull-right"></h6>
                                        <h3 id="name"></h3>
                                    </div>
                                    <a href="#">
                                        <img id="img_sanctuary" class="img-responsive section-images" alt="" src="" />
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


        </div>

<script>

    //hide all cat sections & show a cat
    function showCat($section){
        $(".section_all").hide();
        $("." + $section).show();
    }


    $("document").ready(function(){
        $("#all").click(function(){
            $(".section_all").show();
        });

        $("#section_plants ").click(function(){
            showCat("plants");
        })
        $("#section_birds").click(function(){
            showCat("birds");
        });

        $("#section_inserts").click(function(){
            showCat("insects");
        });

        var cat = 'all';
        $.ajax({
            url : 'api/list/'+cat,
            dataType : 'jsonp',
            success : function(response){
                //clone our template

                var template_plants = $("#template").clone();

                if (response.success == true){
                    var cat = response.data;
                    // console.log("cat",response.data)
                    $.each(cat, function(index,items){

                        var clone_template_plants = $("#template").clone();

                        $(clone_template_plants).addClass(items.list_cat);
                        $(clone_template_plants).attr('id',items.list_id + "_" + items.list_cat);


                        $("#cat", clone_template_plants).text(items.list_cat);
                        $("#name", clone_template_plants).text(items.list_name);
                        $("#points", clone_template_plants).text(items.list_points);
                        $("#img_sanctuary", clone_template_plants).attr('src',$imagePath +items.list_img);
                        $("#description", clone_template_plants).text(items.list_desc);


                        $(".tab-content").append(clone_template_plants);

                    })

                }else{
                    //  alert(" failed" + response.data)
                }
                //  console.log("response",response)

                //showCat()
            }
        });






    })

</script>

