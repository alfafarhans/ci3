<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/home.css">
	
</head>
<body>
    <div id="wrapper">
    <!-- bagian navbar  -->
    <?php if(isset($user_id))
    {
        echo '
        <div id="top">
            <div id="navbar_kiri">
                <a href="#"> Seminar Go </a>
            </div>
            <div id="navbar_kanan">
                <a href="'.base_url().'index.php/logout">LOGOUT </a> 
                <div id="dropdown">
                <img src="../asset/pict/profile1.png">

                <div id="dropdown-content">
                    <a href="#"> Profile </a> <br> <br>
                    <a href="#"> My Event </a> <br> <br>
                    <a href="#"> Sign Out </a>
                </div>
            </div>
            </div>
        </div> ';
    }
    else{
        echo '
        <div id="top">
            <div id="navbar_kiri">
                <a href="'.base_url().'index.php/"> Seminar Go </a>
            </div>
            <div id="navbar_kanan">
                <a href="'.base_url().'index.php/ads">Advertising </a> 
                <a href="'.base_url().'index.php/login">Sign in</a>
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
            <select name="date">
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
            <select name="category" >
            <option value="anycategory" selected> Any Category </option>
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
            <select name="category" >
            <option value="anyprice" selected> Any Price </option>
            <option value="free"> Free </option>
            <option value="paid"> Paid </option>
            <select>
        </div>
    </div>   
    
    <!-- bagian isi  -->
    <div id="body">
    <div id="postinduk">
            <div id="post">
                <a href="<?php echo base_url();?>index.php/event_detail"> <img src="<?php echo base_url();?>asset/pict/seminar1.png"> </a>
                <div id="descbox"> 
                    <div id="namaseminar"> Indonesia Ves 2019 </div>
                    <div id="dateseminar"> Wed, 10 April, 12.30</div>
                    <div id="locseminar"> Senayan, Jakarta Selatan</div>
                </div>
            </div>

            <div id="post">
                <img src="<?php echo base_url();?>asset/pict/seminar2.png">
                <div id="descbox"> 
                    <div id="namaseminar"> National Youth Summit </div>
                    <div id="dateseminar"> Sun, 14 April, 12.00 </div>
                    <div id="dateseminar"> Hotel Grand Sahid, Jakarta </div>
                </div>
            </div>
        </div>
        
        <div id="postinduk"> 
            <div id="post">
                <img src="<?php echo base_url();?>asset/pict/seminar3.png">
                <div id="descbox"> 
                    <div id="namaseminar"> Machine Learning dan IoT </div>
                    <div id="dateseminar"> Sat, 31 Agustus, 08.00 </div>
                    <div id="dateseminar"> Auditorium Lt7 Mercubuana Meruya, Jakarta </div>
                </div>
            </div>
          
            <div id="post">
                <img src="<?php echo base_url();?>asset/pict/seminar1.png">
                <div id="descbox"> 
                    <div id="namaseminar"> Indonesia Ves 2019 </div>
                    <div id="dateseminar"> Wed, 10 April, 12.30</div>
                    <div id="locseminar"> Senayan, Jakarta Selatan</div>
                </div>
            </div>
        </div>
        
        <div id="postinduk">  

            <div id="post">
                <img src="<?php echo base_url();?>asset/pict/seminar2.png">
                <div id="descbox"> 
                    <div id="namaseminar"> National Youth Summit </div>
                    <div id="dateseminar"> Sun, 14 April, 12.00 </div>
                    <div id="dateseminar"> Hotel Grand Sahid, Jakarta </div>
                </div>
            </div>

            <div id="post">
                <img src="<?php echo base_url();?>asset/pict/seminar3.png">
                <div id="descbox"> 
                    <div id="namaseminar"> Machine Learning dan IoT </div>
                    <div id="dateseminar"> Sat, 31 Agustus, 08.00 </div>
                    <div id="dateseminar"> Auditorium Lt7 Mercubuana Meruya, Jakarta </div>
                </div>
            </div>
        
        </div> 
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
