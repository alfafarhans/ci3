<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/event_detail.css">
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
                    <img id="jdrop" class="imgdrop" src="../asset/pict/profile/'.$user_id.'.png">
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
    
    ?>   

    <!-- bagian isi  -->
  
    <div id="body">
        <div id="bodyartikel2">
            <div id="shadow">
                <div id="flexbod">
                <?php
                    foreach ($seminar as $value) {
                        if($value['seminar_price'] == 0){
                            $price = "FREE";
                        }
                        else {
                            $price = $value['seminar_price'];
                        }
                        echo'
                    <div id="leftposttop">
                        <img src="'.base_url().'asset/pict/banner/'. $value['seminar_banner'].'">
                    </div>
            
                    <div id="rightposttop">
                        <div id="padding">
                            <h2> '.$value['seminar_name'].' </h2> 
                            <p> Rp&nbsp;'.$price.' </p>
                        </div>
                    </div>';
                    }
            
                ?>
            </div>
        </div>

            <div id="shadow">
                <div id="flexbod">
                    <div id="leftpost">
                        <div id="padding">
                <?php
                $userid = $this->session->userdata('user_id');
                if(isset($userid)){
                    foreach ($seminar as $value) {
                        echo 
                    '<a href="#" onClick="send('.$value['seminar_id'].','.$userid.')"> Daftar </a>';
                        }
                    }
                    else{
                    echo
                    '<a href='. base_url().'login/> Daftar </a>';
                    }
            
                    ?>
                        
                        </div>
                    </div>
            
                    <div id="rightpost">
                        <div id="padding">
                            
                        </div>
                    </div>
                </div>
            </div>

            <div id="shadow">
                <div id="flexbod">
                    <div id="leftpost">
                    <?php
                    
                    foreach ($seminar as $value) {
                //convert time
                $dayname = date('l', strtotime($value['seminar_date']));
                $daynum = date('d', strtotime($value['seminar_date']));
                $mounth = date('m', strtotime($value['seminar_date']));
                $year = date('Y', strtotime($value['seminar_date']));
                $hours =  date('H', strtotime($value['seminar_date']));
                $minute =  date('i', strtotime($value['seminar_date']));
                $month_num =$mounth; 
                $month_name = date("F", mktime(0, 0, 0, $month_num, 10));  
                $sbstr =  substr($dayname,0,3);


                echo' 
                    <div id="obj-post">
                        <div id="obj-judul"> Date and Time </div>
                        <p>'.$sbstr.',&nbsp;'.$daynum.'&nbsp;'.$month_name.'&nbsp;'.$year.',&nbsp;'.$hours.'.'.$minute.'</p>
                    </div>

                    <div id="obj-post">
                        <div id="obj-judul"> Location </div>
                        <p>'.$value['seminar_held'].'</p>
                    </div>

                    <div id="obj-post">
                        <div id="obj-judul"> Dress Code </div>
                        <p>'.$value['seminar_drcode'].'</p>
                    </div>';
                    }
            
                    ?>
                    </div>
            
                    <div id="rightpost">
                    <?php
                    foreach ($seminar as $value) {
                        //convert to array
                        $cnvt = explode(',' , $value['seminar_tag']);

                        echo 
                        '<div id="obj-post">
                            <div id="obj-judul"> Description </div>
                            <p> '.$value['seminar_desc'].'</p>
                        </div>
                        <div id="obj-post">
                            <div id="obj-judul"> Tag </div>
                            <p>';
                        foreach ($cnvt as $newloop) {
                            echo'
                                <a href="#">'.$newloop.'</a>' ;
                            }
                            echo' </p>
                        </div>
                        </div>
                        </div>
                            
                        <div id="flexbod">
                            <iframe width="100%" height="250px" src="'.$value['seminar_maps'].'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                            </iframe>
                        </div>';
                        }
            
            ?>
                 
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