
<div class="container">

    <div class="page-header">
        <h1>Sanctuary <small>Bootstrap template, demonstrating an example portfolio page layout</small></h1>
    </div>

    <div class="page-header-menu">
        <div class="bs-example">
          <!--  <ul class="nav nav-tabs" id="myTab">
                <li><a data-toggle="tab" href="#sectionA">BIRDS</a></li>
                <li><a data-toggle="tab" href="#sectionB">PLANTS</a></li>

                <li><a data-toggle="tab" href="#sectionC">INSERT</a></li>

            </ul>-->








                    <div class="container tab-content  ">
                        <div class="birdListView  " style="display: none">
                            <div  id="template" class=" col-lg-3 col-md-3 main_json_object ">


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

                                        <p id="description">

                                        </p>
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


        </div>

<script>
    $("document").ready(function(){
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

                        console.log("items",items);

                        var clone_template = $("#template").clone();
                        $("#cat", clone_template).text(items.list_cat);
                        $("#name", clone_template).text(items.list_name);
                        $("#points", clone_template).text(items.list_points);
                        $("#img_sanctuary", clone_template).attr('src',"template/include/images/" +items.list_img);
                        $("#sound", clone_template).attr('src',items.list_sound);
                        $("#description", clone_template).text(items.list_desc);
                        console.log("clone_template",clone_template.html());

                       $(".tab-content").append(clone_template);

                    })

                }else{
                    alert("login failed" + response.data)
                }
              //  console.log("response",response)
            }
        });


    })

</script>

