<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/profile.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/my_event.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/asset/css/settings.css">
    <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
    
    window.onclick = function(event) {
        if ( (!event.target.matches('.dropdown')) &&(!event.target.matches('.imgdrop')) && (!event.target.matches('.result_sem')) && (!event.target.matches('.result_loc')) && (!event.target.matches('.p')) ){
            $('#jcdrop').slideUp("fast");
            $("#result_sem").html("");
            $("#result_loc").html("");
            $('#seminar').val("");
            $('#location').val("");
        }
    }

    $(function() {
        function navToContent(url){
		$.ajax({
			type: "GET",
			url: url,
			cache: false,
			beforeSend: function(data){
				$("#rightbody2").html("");
			},
			success: function(data){
				$("#rightbody2").html(data);
			}
		});
		return false;
    }
    
    //all trigerstate
    $('#jdrop').on('click', function() {
            $('#jcdrop').slideDown( "fast" );
        });
    $('#profile').on('click', function() {
        let urli = "<?php echo base_url(); ?>profile/changepage/profile";
        navToContent(urli);
        });
    $('#myevent').on('click', function() {
        let urli = "<?php echo base_url(); ?>profile/changepage/myevent";
        navToContent(urli);
    });
    $('#setting').on('click', function() {
        let urli = "<?php echo base_url(); ?>profile/changepage/setting";
        navToContent(urli);
    });
    $(document).ready(function() {
        let state = <?php echo $state?>;
        if(state == 1){
            $('#profile').click();
        }
        else if (state == 2) {
            $('#myevent').click();
        }
        else if (state == 3) {
            $('#setting').click();
        }
     });
        
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
            <div id="leftbody">
                <div id="active">
                    <a href="#" id ="profile"> Profile </a>
                </div>
                <div id="objleft">
                    <a href="#" id ="myevent"> My Events </a>
                </div>
                <div id="objleft">
                    <a href="#" id ="setting"> Settings </a>
                </div>
            </div>

            <div id="rightbody">
                <div id="objright">
                    <h3> Profile </h3> 
                    Silahkan lengkapi data diri anda. Data diri anda di perlukan untuk keperluan administrasi aktifitas seminar yang anda ikuti. 
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