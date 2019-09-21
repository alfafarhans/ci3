<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/style.css">
        <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript">
            
     $(function() {
		$("#submit").click(function() {
			var email = $("#email").val();
			var password = $("#password").val();
			var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            var submit = $("#submit").val();
			var dataString = 'email=' + email + '&password=' + password + '&firstname=' + firstname + '&lastname=' + lastname+ '&submit=' + submit;
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>index.php/register/register_proceses",
					data: dataString,
					cache: false,
					success: function(data){
                    //console.log(data);
                    //  console.log(responParse.msg);
                    // console.log(responParse.status);
                        var responParse = JSON.parse(data);
                        if( responParse.msg == "Yeay!"  ){
                            alert(responParse.msg);
                            alert('Your Account Succesfully Created');
                            window.location.replace("<?php echo base_url();?>index.php/login");
                        }
                        else{
                            alert(responParse.msg);
                        }
                   
					}
				});
			
			return false;
		});
            });

        </script>
    </head>
<body>
    <div id="wrapper">
        <script>
        
        </script>
    <!-- bagian navbar  -->
    <!-- bagian navbar  -->
    <div id="top">
        <div id="navbar_kiri">
            <a href="<?php echo base_url();?>index.php/"> Seminar Go </a>
        </div>
        <div id="navbar_kanan">
            <a href="<?php echo base_url();?>index.php/ads">Advertising </a> 
            <a href="<?php echo base_url();?>index.php/login">Sign in</a>
        </div>
    </div>

    <!-- bagian isi  -->
    <div id="body">
        <div id="bodyartikel">
            <h1> Create your account </h1>

            <div id="register">
                    <div class="row">
                        <div class="col-25">
                            <label for="email"> Email </label>
                        </div>

                        <div class="col-75">
                            <input type="text" id="email" name="email" placeholder="Your email.." required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="firstname"> First Name </label>
                        </div>

                        <div class="col-75">
                            <input type="text" id="firstname" name="firstname" placeholder="Your name.." required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="lastname"> Last Name </label>
                        </div>

                        <div class="col-75">
                            <input type="text" id="lastname" name="lastname" placeholder="Your last name.." required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="password"> Password </label>
                        </div>

                        <div class="col-75">
                            <input type="password" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>

                    <div class="row">
                        <input type="submit" id="submit" name="submit" value="Register">
                    </div>
              
            </div>


        </div>
    </div>

    <!-- bagian footer  -->
    <div id="footer">
        <p>Copyright © 2019 </p>
    </div>
    </div>
</body>
</html>