<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/profile_admin.css">
    <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
   function send(eventid,userid) {
                $.ajax({
					type: "POST",
					url: "<?php echo base_url();?>event_detail/applyevent/"+eventid+"/"+userid,
					cache: false,
					success: function(data){
                    //console.log(data);
                    //  console.log(responParse.msg);
                    // console.log(responParse.status);
                        var responParse = JSON.parse(data);
                        if( responParse.msg == "Yeay!"  ){
                            alert(responParse.msg);
                            alert('Your Account Succesfully Created');
                            window.location.replace("<?php echo base_url();?>home");
                        }
                        else{
                            alert(responParse.msg);
                        }
					}

				});
        }

    /* Icon User Click Close
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }*/
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

        //ALL TRIGEER
        $('#jdrop').on('click', function() {
            $('#jcdrop').slideDown( "fast" );
        });
    });

    </script>
	
</head>
<body>
    <div id="wrapper">

    <div id="topr">
    </div>

    <!-- bagian navbar  -->
    <?php if(isset($user_id))
    {
      
        echo '
        <div id="top">
            <div id="navbar_kiri">
                <a href="'.base_url().'home"> Seminar Go </a>
            </div>
            
            <div id="navbar_kanan">
                <a id="a" href="'.base_url().'ads">Advertising </a>

                <div id="jdrop" class="dropdown">
                    <div id="jdrop" class="p"> Welcome '.$username.' ! </div>
                    <img id="jdrop" class="imgdrop" src="../asset/pict/profile/'.$user_id.'.jpg">
                 </div>
                <div id="jcdrop" class="dropdown-content">
                <a href="'.base_url().'profile/myprofile/1"> Profile </a> 
                <a href="'.base_url().'profile/myprofile/2"> My Event </a> 
                <a href="'.base_url().'profile/myprofile/3"> Settings </a> 
                <a href="'.base_url().'logout"> Sign Out </a>
                </div>
            </div>
        </div> ';
        
    }
    else{
        echo '
        <div id="top">
            <div id="navbar_kiri">
                <a href="'.base_url().'home"> Seminar Go </a>
            </div>
            
            <div id="navbar_kanan">
                <a id="a" href="'.base_url().'ads">Advertising </a> 
                <a id="a" href="'.base_url().'login/">Sign in</a>
            </div>
        </div> ';
    }
    
//$("a:visited").parent("li").addClass("is_visited");        
    ?>

    <!-- bagian isi  -->
    <div id="body">
        <div id="bodyartikel2">
            <div id="leftbody">
                <div class="active">
                    <a href="#" id ="app-pay"> Approval Payment </a>
                </div>
                <div class="objleft">
                    <a href="#" id ="app-sem"> Approval Seminar </a>
                </div>
            </div>

            <div id="mainright">
	            <div id="rightbody3">
		            <div id="objright4">
			            <div id="desc">
				            <div id="namatx">
                                Pembayaran National Youth Summit (35000)
				            </div>  
				            <div id="kettx">
                                BCA | Alfa Farhan | 41517320004 | <a href="<?php echo base_url();?>asset/pict/bukti-tf/1.png" target="_blank"> bukti_tf.png </a>
				            </div> 
			            </div>
                    </div>
                    <div id="bota">
                        <input type="submit" id="app-pay" name="app-pay" value="Approve">
                    </div>
                </div>
                
                <div id="rightbody3">
		            <div id="objright4">
			            <div id="desc">
				            <div id="namatx">
                                Pembayaran Kecerdasan Buatan (25000)
				            </div>  
				            <div id="kettx">
                                Mandiri | Irfan Nazmi | 41517320006 | <a href="<?php echo base_url();?>asset/pict/bukti-tf/1.png" target="_blank"> bukti_tf.png </a>
				            </div> 
			            </div>
                    </div>
                    <div id="bota">
                        <input type="submit" id="app-pay" name="app-pay" value="Approve">
                    </div>
                </div>
                
                <div id="rightbody3">
		            <div id="objright4">
			            <div id="desc">
				            <div id="namatx">
                                Pembayaran National Youth Summit (35000)
				            </div>  
				            <div id="kettx">
                                BNI | Yanualdi | 41517320009 | <a href="<?php echo base_url();?>asset/pict/bukti-tf/1.png" target="_blank"> bukti_tf.png </a>
				            </div> 
			            </div>
                    </div>
                    <div id="bota">
                        <input type="submit" id="app-pay" name="app-pay" value="Approve">
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