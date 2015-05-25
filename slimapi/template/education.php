

<div class="container-fluid sanctuary_container">

    <div class="container">

        <div class="page-header">
            <h1>Sanctuary <small></small></h1>
        </div>

        <div class="page-header-menu">
            <div class="bs-example">
                <ul class="nav nav-tabs" id="myTab">


                </ul>
            </div>
    </div>
        <div class="container tab-content sanctuary_view ">
            <div class="  " style="display:none">

                <div  id="template" class="col-lg-3 col-md-3 section_all">
                    <div class="json_object_wrapper">
                        <div class="json_object_innerWrapper">
                            <div class="json_object_header">
                                <h3 class="pull-right" id="points"></h3>
                                <h3 id="name"></h3>

                            </div>
                            <div class="json_object_header_2">
                                <h4 id="list_type" class="fa fa-circle pull-right"></h4>
                                <h4 id="cat"></h4>
                            </div>
                            <a href="#">
                                <img id="img_sanctuary" class="img-responsive section-images" alt="" src="" />
                            </a>
                            <p id="description_p"></p>
                        </div>



                    </div>

                    <div class="break_list"/>
                </div>

            </div> <!-- clone template end--->
        </div>


    </div>
</div>
<script>
        $("document").ready(function(){
            var cat='all';
            $.ajax({
                url : 'api/list/'+cat,
                dataType : 'jsonp',
                success : function(response){
                    var template_plants = $("#template").clone();
                    if (response.success == true){
                        var cat = response.data;
                        $.each(cat, function(index,items){
                            if (items.list_active == "0") return true;
                            var clone_template_plants = $("#template").clone();
                            $(clone_template_plants).addClass(items.list_type);
                            $(clone_template_plants).addClass(items.list_cat);
                            $(clone_template_plants).attr('id',items.list_id + "_" + items.list_cat);
                            $("#cat", clone_template_plants).text(items.list_cat);
                            $("#name", clone_template_plants).text(items.list_name);
                            $("#points", clone_template_plants).text(items.list_points);
                            $("#list_type", clone_template_plants).text(items.list_type);
                            $("#img_sanctuary", clone_template_plants).attr('src',$imagePath +items.list_img);
                            $("#description_p", clone_template_plants).text(items.list_desc);


                            $(".tab-content").append(clone_template_plants);
                        })
                    }else{
                          alert(" failed" + response.data)
                    }
                      console.log("response",response);
                }
            });


        })

</script>