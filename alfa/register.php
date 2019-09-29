<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">
	
</head>
<body>
    <div id="wrapper">
    <!-- bagian navbar  -->
    <div id="top">
        <div id="navbar_kiri">
            <a href="./home.php"> Seminar Go </a>
        </div>
        <div id="navbar_kanan">
            <a href="#">Advertising </a> 
            <a href="./login.php">Sign in </a>
        </div>
    </div>   

    <!-- bagian isi  -->
    <div id="body">
        <div id="bodyartikel">
            <h1> Create your account </h1>

            <div id="register">
                <form method="post" action="#">
                    <div id="row">
                        <label for="email"> Email </label>
                        <input type="text" id="email" name="email" placeholder="Your email..">
                    </div>

                    <div id="row">
                            <label for="firstname"> First Name </label>
                            <input type="text" id="firstname" name="firstname" placeholder="Your name..">
                    </div>

                    <div id="row">
                            <label for="lastname"> Last Name </label>
                            <input type="text" id="lastname" name="lastname" placeholder="Your last name..">
                    </div>

                    <div id="row">
                            <label for="password"> Password </label>
                            <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                   
                    <div id="row">
                        <div id="right">
                            <input type="submit" value="Register">
                        </div>   
                    </div>
                    
                </form>
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
</body>
</html>