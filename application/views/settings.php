<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/css/settings.css">
    <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
    
    window.onclick = function(event) {
        if ( (!event.target.matches('.dropdown')) &&(!event.target.matches('.imgdrop')) && (!event.target.matches('.result_sem')) && (!event.target.matches('.result_loc')) && (!event.target.matches('.p')) ){
            $('#jcdrop').slideUp();
            $("#result_sem").html("");
            $("#result_loc").html("");
            $('#seminar').val("");
            $('#location').val("");
        }
    }

    $(function() {
    });
    
    </script>
	
</head>
<body>
    <div id="wrapper">

    <div id="topr">
    </div>

    <!-- bagian navbar  -->
    <?php 
    
      
        echo '
        <div id="top">
            <div id="navbar_kiri">
                <a href="'.base_url().'home"> Seminar Go </a>
            </div>
            
            <div id="navbar_kanan">

                <div id="jdrop" class="dropdown">
                    <div id="jdrop" class="p"> Welcome '.$username.' ! </div>
                    <img id="jdrop" class="imgdrop" src="'.base_url().'/asset/pict/profile/'.$user_id.'.png">
                 </div>
                <div id="jcdrop" class="dropdown-content">
                    <a href="'.base_url().'profile/"> Profile </a> 
                    <a href="'.base_url().'my_event/"> My Event </a> 
                    <a href="'.base_url().'settings/"> Settings </a> 
                    <a href="'.base_url().'logout"> Sign Out </a>
                </div>
            </div>
        </div> ';
        
    ?>

    <!-- bagian isi  -->
    <div id="body">
        <div id="bodyartikel2">
            
            <div id="rightbody">
                <div id="objright">
                    <h3> Settings </h3> 
                    Konfigurasikan akun anda, lakukan pergantian password rentang waktu tertentu.
                </div>
            </div>

            <div id="rightbody2">
                <div id="objright2">
                <?php
                foreach ($userdata->result_array() as $value) {
                 $firstnamefill = str_replace(" ","&nbsp;",$value['first_name']);
                 $name = ucwords($firstnamefill."&nbsp;".$value['last_name']);
        echo '

    <div id="row">
        <div id="col-25"> 
            Email
        </div>
        <div id="col-75"> 
            <input type="text" id="email" name="email" value="alfafarhansyarief@yahoo.co.id">
        </div>
    </div>

    <div id="row">
        <div id="col-25"> 
            Password lama
        </div>
        <div id="col-75"> 
            <input type="text" id="passwordl" name="passwordl">
        </div>
    </div>

    <div id="row">
        <div id="col-25"> 
            Password baru
        </div>
        <div id="col-75"> 
            <input type="text" id="passwordb" name="passwordb">
        </div>
    </div>

';
                }
                
                ?>
                    
                </div>
            

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