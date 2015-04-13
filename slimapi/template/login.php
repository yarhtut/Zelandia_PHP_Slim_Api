

        <div class="container-fluid login_container ">
                <div class="login_form ">
                       <span class="backto pull-right"><em><a href="home">&laquo; back to the site</a></em></span></li>

                        <h1 class="warning">ZEALANDIA</h1>  <!--<h3 class="pull-left"> ADMIN LOGIN</h3>-->
                       <input type="text" id="username"name="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus"/>

                       <input type="password"  class="form-control" name="password" id="password" placeholder="Password" required="required" />

                       <button id="sign_in" class="btn btn-sm btn-warning btn-block" value="LOGIN"  type="submit">Sign in</button>

                </div>
        </div>



<script>
    $(document).ready(function(){

        $("#sign_in").click(function(){

            var account_details = {
                username : $("#username").val(),
                password : $('#password').val()
            }

            $.ajax({
                url : 'api/login',
                data : account_details,
                dataType : 'jsonp',
                success : function(response){
                    if (response.success == true){
                        location.reload();

                    }
                    else{
                        alert("login failed" + response.data)
                    }
                    console.log("response",response)
                }

            });
        })



    })
</script>
