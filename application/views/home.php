<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/home.css">
    <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
    $(function() {
        function search_seminar() {
        var seminar_search =  $("#seminar").val();
        $.ajax({
        url:"<?php echo base_url(); ?>home/search/",
        method:"POST",
        data:{datasearch:seminar_search},
        success:function(data){
        $('#result').html(data);
        console.log(data);}
              });
            }
        function filcat(cat,price,date) {

            $.ajax({
            url:"<?php echo base_url(); ?>home/filcat",
            method:"POST",
            data:{cat1:cat,price1:price,date1:date},
            success:function(data){
            $('#postinduk').html(data);
                }
            });
        }
        function ceklunch() {
            var price =  $("#price").val();
            var category =  $("#category").val();
            var date =  $("#date").val();
            filcat(category,price,date);
        }
        $('#seminar').on('keyup', function() {
            search_seminar();
        });
        $('#category').on('change', function() {
            ceklunch();
        });
        $('#price').on('change', function() {
            ceklunch();
        });
        $('#date').on('change', function() {
            ceklunch();
        });
    });
    </script>
</head>
<body>
    <div id="wrapper">
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
                
                <div id="dropdown">
                    <img src="./asset/pict/profile/fajarbarokah98@yahoo.co.id.png">

                    <div id="dropdown-content">
                        <a href="'.base_url().'profile/"> Profile </a> 
                        <a href="#"> My Event </a> 
                        <a href="#"> Settings </a> 
                        <a href="'.base_url().'logout"> Sign Out </a>
                    </div>
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

    <!-- bagian header  -->
    <div id="header">
        <img src="<?php echo base_url();?>asset/pict/header1.png">
    </div>

    <!-- bagian pencarian  -->
    <div id="smart">
        <div id="item">
            <label for="seminar"> Seminar </label>
            <input type="text" id="seminar" name="seminar">
        </div>

        <div id="item">
            <label for="location"> Location </label>
            <input type="text" id="location" name="location" >
        </div>

        <div id="item">
            <label for="date"> Date </label>
            <br>
            <select id="date">
                <option value="anydate" selected> Any Date </option>
                <option value="today"> Today </option>
                <option value="tomorrow"> Tomorrow</option>
                <option value="thisweekend"> This Weekend</option>
                <option value="thisweek"> This Week</option>
                <option value="nextweek"> Next Week</option>
                <option value="thismonth"> This Month</option>
                <option value="nextmonth"> Next Month</option>
            <select>
        </div>
        <div id="item">
            <label for="category"> Category </label>
            <br>
            <select id="category" >
                <option value="" selected> Any Category </option>
                <option value="otomotif"> Auto, Boat & air</option>
                <option value="business"> Business</option>
                <option value="charity"> Charity & Causes</option>
                <option value="family"> Family & Education</option>
                <option value="fashion"> Fashion</option>
                <option value="film"> Film & Media</option>
                <option value="fooddrink"> Food & Drink</option>
                <option value="goverment"> Govevrment </option>
                <option value="health"> Health</option>
                <option value="hobbies"> Hobbies</option>
                <option value="holiday"> Holiday</option>
                <option value="homelifefstyle"> Home & Lifefstyle</option>
                <option value="schoolactivies"> School Activies</option>
                <option value="sciencetech"> Science & Tech</option>
                <option value="spiritually"> Spiritually</option>
                <option value="sportitness"> Sport & Fitness</option>
                <option value="traveloutdoor"> Travel & Outdoor</option>
            <select>
        </div>

        <div id="item">
            <label for="category"> Price </label>
            <br>
            <select id="price" >
                <option value="" selected> Any Price </option>
                <option value="free"> Free </option>
                <option value="paid"> Paid </option>
            <select>
        </div>
    </div>   
    
    <!-- bagian isi  -->
    <div id="body">
    <div id="postinduk">
    <div id = "result"></div>
    <?php
        foreach ($fetched_arr as $value) {
            //convert time
            $dayname = date('D', strtotime($value['seminar_date']));
            $daynum = date('d', strtotime($value['seminar_date']));
            $mounth = date('F', strtotime($value['seminar_date']));
           // $year = date('Y', strtotime($value['seminar_date']));
            $hours =  date('H', strtotime($value['seminar_date']));
            $minute =  date('i', strtotime($value['seminar_date'])); 
            
            //show reulst
            if(isset($user_id)){
            echo 
        '<div id="post">
            <a href="'. base_url().'event_detail/'. $value['seminar_id'].'"> ';
                }
            else{
            echo 
            '<div id="post">
            <a href="'. base_url().'login/"> ';
            }
            echo'
            <img src="'.base_url().'asset/pict/banner/'. $value['seminar_banner'].'">
            </a>
            <div id="descbox"> 
                <div id="namaseminar">'.$value['seminar_name'].' </div>
                <div id="dateseminar">'.$dayname.',&nbsp;'.$daynum.'&nbsp;'.$mounth.',&nbsp;'.$hours.'.'.$minute.'</div>
                <div id="locseminar">'.$value['seminar_held'].'</div>
            </div>
        </div>';
        }
        
    ?>
    </div>
    <!-- bagian footer  -->

    <div id="infofooter">
    </div>
    
    <div id="footer">
        <p>Copyright © 2019 </p>
    </div>
    </div>
</body>
</html>
