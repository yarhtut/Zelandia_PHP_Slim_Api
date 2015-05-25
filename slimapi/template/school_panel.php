<?php
/**
 * User: yar
 * Date: 18/05/2015
 * Time: 10:43 AM
 */
?>
<!--------------------------------------------list Panel--------------------------------------------->
<div id="activity_panel" class=" ">
    </br>
     <button id="btn_add_new_schools" data-toggle="modal" data-target="#myModalSchools" class="btn btn-success pull-left">
         Add New Schools
     </button>


    </br> </br> </br>
    <ul id="template_header" class="nav ">
        <li class="col-lg-4" ><h3>School Id</h3></li>
        <li class="col-lg-4" > <h3>School Name</h3></li>
        <li class="col-lg-4" > <h3>More Option</h3></li>
    </ul>
    <div class="tab_content">
        <div class="schoolsList" style="display:none">
            <ul  class="nav list_template " id="schools_template">
                <li class="col-lg-4" id="schools_id" ></li>

                <li class="col-lg-4" class="schools_name" id="school_name"></li>
                <li class="col-lg-4">
                    <button type="button" class="btn col-lg-1 btn-primary btn_schools_option" data-toggle="modal"
                            data-target="#myModalSchools" data-title="More Option">More Option</button>
                </li>

            </ul>
        </div>
    </div>
</div>

<script>




</script>