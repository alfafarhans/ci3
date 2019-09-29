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
            <h1> Sign in </h1>

            <div id="register">
                <form method="post" action="#">
                    <div id="row">
                        <input type="text" name="username" placeholder="Username">
                    </div>

                    <div id="space"></div>

                    <div id="row">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    
                    <div id="row">
                        <div id="left">
                            <input type="submit" value="Sign In">
                        </div>
                        
                        <div id="col-75">
                            <p> Belum punya akun? <a href="./register.php"> Daftar sekarang </a>
                        </div>
                    </div>
                </form>
            </div>

            <br>
            <br>

            <div id="font1"> By continuing, I accept the Seminar-Go terms of service, community guidelines and have read the privacy policy. </div>

            <br>
            <br>

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