<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/profile.css">
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
				$("#mainright").html("");
			},
			success: function(data){
				$("#mainright").html(data);
			}
		});
		return false;
    }
    
    //all trigerstate
    $('#jdrop').on('click', function() {
            $('#jcdrop').slideDown( "fast" );
        });
    $('#profile').on('click', function() {
        $("div#leftbody > div.objleft" ).removeClass("active");
        $(this).parent().addClass("active");
        let urli = "<?php echo base_url(); ?>profile/changepage/profile";
        navToContent(urli);
        });
    $('#myevent').on('click', function() {
        
        $("div#leftbody > div.objleft" ).removeClass("active");
        $(this).parent().addClass("active");
        let urli = "<?php echo base_url(); ?>profile/changepage/myevent";
        $("#btn1").attr("id", "btn2");
        navToContent(urli);
    });
    $('#setting').on('click', function() {
        
        $("div#leftbody > div.objleft" ).removeClass("active");
        $(this).parent().addClass("active");
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
                <a href="'.base_url().'profile/myprofile/1"> Profile </a> 
                <a href="'.base_url().'profile/myprofile/2"> My Event </a> 
                <a href="'.base_url().'profile/myprofile/3"> Settings </a> 
                <a href="'.base_url().'logout"> Sign Out </a>
                </div>
            </div>
        </div> ';
//$("a:visited").parent("li").addClass("is_visited");        
    ?>

    <!-- bagian isi  -->
    <div id="body">
        <div id="bodyartikel2">
            <div id="leftbody">
                <div class="objleft">
                    <a href="#" id ="profile"> Profile </a>
                </div>
                <div class="objleft">
                    <a href="#" id ="myevent"> My Events </a>
                </div>
                <div class="objleft">
                    <a href="#" id ="setting"> Settings </a>
                </div>
            </div>

            <div id="mainright">
                

              
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