<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../asset/css/profile.css">
	
</head>
<body>
    <div id="wrapper">

    <!-- bagian navbar  -->
    <div id="top">
        <div id="navbar_kiri">
            <a href="<?php echo base_url();?>home"> Seminar Go </a>
        </div>
        <div id="navbar_kanan">

            <div id="dropdown">
                <img src="../asset/pict/profile1.png">
            
                <div id="dropdown-content">
                    <a href="<?php echo base_url();?>profile"> Profile </a>
                    <a href="#"> My Event </a>
                    <a href="#"> Settings </a> 
                    <a href="#"> Sign Out </a>
                </div>
            </div>
        </div>
    </div>   

    <!-- bagian isi  -->
    <div id="body">
        <div id="bodyartikel2">
            <div id="leftbody">
                <div id="active">
                    <a href="<?php echo base_url();?>index.php/profile"> Profile </a>
                </div>
                <div id="objleft">
                    <a href="#"> My Events </a>
                </div>
                <div id="objleft">
                    <a href="#"> Settings </a>
                </div>
                <div id="objleft">
                    <a href="#"> Sign Out </a>
                </div>
            </div>

            <div id="rightbody">
                <div id="objright">
                    <h3> Profile </h3> 
                    Silahkan lengkapi data diri anda. Data diri anda di perlukan untuk keperluan administrasi aktifitas seminar yang anda ikuti. 
                </div>

                <div id="objright2">
                    <div id="row">
                        <div id="col-25"> 
                            Profile Picture
                        </div>
                        <div id="avatar"> 
                            <img src="../asset/pict/profile1.png"> 
                        </div>
                        <div id="upload"> 
                            <input type="file" name="profilepic">
                        </div>
                    </div>

                    <div id="row">
                        <div id="col-25"> 
                            Nama 
                        </div>
                        <div id="col-75"> 
                            <input type="text" id="firstname" name="firstname" value="Alfa Farhan">
                        </div>
                    </div>

                    <div id="row">
                        <div id="col-25"> 
                            Tanggal Lahir
                        </div>
                        <div id="col-75"> 
                            <input type="date" id="email" name="tanggallahir">
                        </div>
                    </div>

                    <div id="row">
                        <div id="col-25"> 
                            Jenis Kelamin
                        </div>
                        <div id="col-75"> 
                            <select name="sex">
                                <option value="pria" selected> Laki-Laki </option>
                                <option value="wanita"> Perempuan </option>
                            </select>
                        </div>
                    </div>

                    <div id="row">
                        <div id="col-25"> 
                            Alamat
                        </div>
                        <div id="col-75"> 
                            <textarea name="alamat" style="height: 200px;" value="Jl KH Noer Ali No.1 Jakasampurna Bekasi Barat"></textarea>
                        </div>
                    </div>

                </div>
            </div>

            <div id="rightbody2">
                <div id="objright2">
                    <div id="row">
                        <div id="col-25"> 
                        </div>  
                        <div id="col-75"> 
                            <input type="submit" id="submit" name="submit" value="Save">
                        </div>  
                    </div>
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
</body>
</html>