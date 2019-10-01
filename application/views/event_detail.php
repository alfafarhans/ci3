<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/event_detail.css">
	
</head>
<body>
    <div id="wrapper">
    <!-- bagian navbar  -->
    <div id="top">
        <div id="navbar_kiri">
            <a href="<?php echo base_url();?>home"> Seminar Go </a>
        </div>
        <div id="navbar_kanan">
            <a href="<?php echo base_url();?>ads">Advertising </a>
        </div>
    </div>   

    <!-- bagian isi  -->
  
    <div id="body">
        <div id="bodyartikel2">
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

            <div id="flexbod">
                <div id="leftpost">
                    <div id="padding">
                        <a href="#"> Daftar </a>
                    </div>
                </div>
        
                <div id="rightpost">
                    <div id="padding">
                        
                    </div>
                </div>
            </div>

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
                     </div>';
                    }
        
        ?>
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