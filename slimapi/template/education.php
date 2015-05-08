



    <div class="container">

        <div class="page-header">
            <h1>Sanctuary <small>Bootstrap template, demonstrating an example portfolio page layout</small></h1>
        </div>

        <div class="page-header-menu">
            <div class="bs-example">
                <ul class="nav nav-tabs" id="myTab">
                    <li><a data-toggle="tab" href="#sectionA">BIRDS</a></li>
                    <li><a data-toggle="tab" href="#sectionB">PLANTS</a></li>

                    <li><a data-toggle="tab" href="#sectionC">INSERT</a></li>
                   <!-- <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a data-toggle="tab" href="#dropdown1">Dropdown1</a></li>
                            <li><a data-toggle="tab" href="#dropdown2">Dropdown2</a></li>
                        </ul>
                    </li>-->
                </ul>
            </div>
    </div>


        <div class="container tab-content  ">
            <div class="birdListView  " style="display: none">
                <div  id="template" class=" col-lg-3 col-md-3 main_json_object ">


                    <div class="json_object_wrapper ">
                        <div class="json_object_header">
                            <h6 id="sound" class="fa fa-file-sound-o pull-right"></h6>
                            <h3 id="name"></h3>
                        </div>

                        <a href="#">
                            <img id="img_education" class="img-responsive section-images" alt="Bootstrap template" src="" />
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

            </div>

        </div>


    </div>
        <a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>

        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
                <h3 id="myModalLabel">Modal header</h3>
            </div>
            <div class="modal-body">
                <form id="myForm" method="post">
                    <input type="hidden" value="hello" id="myField">
                    <button id="myFormSubmit" type="submit">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
        </div>

</div>

    <script>

        $("document").ready(function(){
            var cat = 'all';

            $.ajax({
                url : 'api/list/'+cat + '/active',
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
                            $("#img_education", clone_template).attr('src',$imagePath +items.list_img);
                            $("#sound", clone_template).attr('src',items.list_sound);
                            $("#description", clone_template).text(items.list_desc);
                           // console.log("clone_template",clone_template.html());

                            $(".tab-content").append(clone_template);

                        })

                    }else{
                       // alert("login failed" + response.data)
                    }
                    //  console.log("response",response)
                }
            });


        })

    </script>