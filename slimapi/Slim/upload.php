<?php
/**
  * User: yar
 * Date: 9/05/2015
 * Time: 9:05 PM
 */





        if (isset($_FILES['file'])){

            $IMAGE_DIR = dirname(__FILE__). DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'galleries' . DIRECTORY_SEPARATOR ;

            $name = $_FILES ['file']['name'];
            $tmp_name = $_FILES ['file']['tmp_name'];

            if(!empty($name)){


                if( move_uploaded_file($tmp_name, $IMAGE_DIR.$name)){

                    echo "Uploaded $name";
                }else{
                    if (file_exists($IMAGE_DIR.$name)){
                        echo "failed to move file $name check file does not exist";
                    }else{

                        echo "Check dir read/write permission's chmod 777";
                    }
                }

            }else{
                echo('Please choose a image');
            }
            // move_uploaded_file("")

            return;
        }
?>


<div id ="uploaded" type="upload_images">

    <input id="file" type="file" name="file">

    <button id="file_upload_button" >Upload</button>

</div>
<script>
    //click upload button
    $(document).on("click","#uploaded #file_upload_button",function(){
//create file form post data
        var formData = new FormData();
        var image = $("#file")[0].files[0];

        if (typeof image == "undefined"){
            alert("Please select image to upload");
            return;
        }

        formData.append("file", image);

        $.ajax({
            url: "update.php?action=upload_images",  //Server script to process data
            type: "POST",
            success: function(response){
                console.log(response)
                if (/Uploaded/.test(response)){

//reset file so new upload
                    $("#file").val("");
                    var image_name = image.name;
                    $("#image_container").append(
                        "<img src='images/upload/"+image_name+"' />"
                    ) .css({
                            width : 400,
//            height:300,
                            margin: 'auto'
                        })
                }

                if (/failed/.test(response)){
                    alert(response);
                }

            },
// Form data
            data: formData,

            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
