<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/register.css">
        <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.4.1.min.js"></script>
        
    </head>
<body>
    <div id="wrapper">

    <div id="topr">
    </div>
    <!-- bagian navbar  -->
    <div id="top">
        <div id="navbar_kiri">
            <a href="<?php echo base_url();?>home"> Seminar Go </a>
        </div>
        <div id="navbar_kanan">
            <a id="a" href="<?php echo base_url();?>login/">Sign in</a>
        </div>
    </div>

    <!-- bagian isi  -->
    <div id="body">
        <div id="bodyartikel">
            <h1> Create your account </h1>

            <div id="register">
                <label for="email"> Email </label>
                <input type="email" id="email" name="email" placeholder="You@seminar-go.com" >

                <label for="firstname"> First Name </label>
                <input type="text" id="firstname" name="firstname" placeholder="ex: Thomas Cruise " >
                
                <label for="lastname"> Last Name </label>
                <input type="text" id="lastname" name="lastname" placeholder="ex: Mapother">
                
                <label for="password"> Password </label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                  
                <div id="rights">
                    <input type="submit" id="submit" name="submit" value="Register">
                </div>
            </div>


        </div>
    </div>

    <!-- bagian footer  -->

    <div id="infofooter600">
    </div>
    
    <div id="footer">
        <p>Copyright © 2019 </p>
    </div>
    </div>
    <script type="text/javascript">
            
     $(function() {
		$("#submit").click(function() {
			var email = $("#email").val();
			var password = $("#password").val();
			var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            var submit = $("#submit").val();
            var cek = false;
            if ((email.indexOf('@') > -1) && (email.length > 0))
            {
                if(firstname.length > 0 ){
                    if(lastname.length > 0 ){
                         if(password.length > 0 ){
                                cek = true;
                            }
                             else{
                                 alert("Emmm, You dont have password ?");
                                     }

                             }
                         else{
                               alert("Emmm, You dont have lastname ?");
                               }
                     }
                    else{
                        alert("Emmm, You dont have firstname ?");
                    }
                }
        
                  else{
                    alert("Hey, Use '@' to fill Email");
                  }
                if (cek) {
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
                            window.location.replace("<?php echo base_url();?>login/");
                        }
                        else{
                            alert(responParse.msg);
                        }
                   
					}
				});
                }
              
			
			return false;
		});
            });

        </script>
</body>
</html>
