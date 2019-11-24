<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/ads.css">
</head>
<body>
    
    <div id="wrapper">

    <div id="topr">
    </div>

    <!-- bagian navbar  -->

    <div id="top">
        <div id="navbar_kiri">
            <a href="'.base_url().'home"> Seminar Go </a>
        </div>
        <div id="navbar_kanan">
            <a id="a" href="'.base_url().'login/">Sign in</a>

            <img class="schico" id="img" src="'.base_url().'asset/pict/icon/search-icon2.png">
                
               
                <div class="humbermenico" id="container">
                    <div class="humbermenico" id="bar1"></div>
                    <div class="humbermenico" id="bar2"></div>
                    <div class="humbermenico" id="bar3"></div>
                </div>
                
            <div id="dropdown-content2">
                <a href="'.base_url().'ads"> Advertising </a> 
                <a href="'.base_url().'login/"> Sign In </a> 
            </div>
        </div>
    </div>

        <!-- bagian isi  -->
    <div id="body">
        <div id="bodyartikel2">
            <div id="toppost">
                <div id="objtop">
                    <center>
                    <h1> Advertising </h1> 
                    Advertise your seminar event on the most popular platform seminar event in the world
                    </center>
		        </div>
            </div>

            <div id="leftbody">
                <div class="objleft">
                    <a href="javascript:void(0);" id ="profile"> Advertising Form </a>
                </div>
                <div class="objleft">
                    <a href="javascript:void(0);" id ="myeventads"> My Status Ads</a>
                </div>
            </div>

            <div id="mainright">
                <form method="post" action="#" enctype="multipart/form-data" id="myform">    
                    <div id="rightbody2">
                        <div id="objright2">
                            <div id="row">
                                <div id="col-25"> 
                                    Seminar Name
                                </div>
                                <div id="col-75"> 
                                    <input type="text" id="semname" name="semname" placeholder="Fill the name of your seminar event" required>
                                </div>
                            </div>

                            <div id="row">
                                <div id="col-25"> 
                                    Seminar Date
                                </div>
                                <div id="col-75"> 
                                    <input type="date" id="semdate" name="semdate"  required>
                                </div>
                            </div>
                            
                            <div id="row">
                                <div id="col-25"> 
                                    Time Start
                                </div>
                                <div id="col-75"> 
                                    <input type="time" id="semtime" name="semtime"  required>
                                </div>
                            </div>

                            <div id="row">
                                <div id="col-25"> 
                                    Seminar Seat
                                </div>
                                <div id="col-75"> 
                                    <input type="number" id="semseat" name="semseat" min="50" placeholder="Fill required seat number your event" required>
                                </div>
                            </div>

                            <div id="row">
                                <div id="col-25"> 
                                    Seminar City
                                </div>
                                <div id="col-75"> 
                                    <input type="text" id="semcity" name="semcity" placeholder="Enter the city where event held on" required>
                                </div>
                            </div>

                            <div id="row" >
                                <div id="col-25"> 
                                    Seminar Held
                                </div>
                                <div id="col-75"> 
                                    <textarea name="semheld" id="semheld" required> Fill seminar held address </textarea>
                                </div>
                            </div>

                            <div id="row" >
                                <div id="col-25"> 
                                    Seminar Description
                                </div>
                                <div id="col-75"> 
                                    <textarea name="semdesc" id="semdesc" required> Fill seminar description </textarea>
                                </div>
                            </div>

                            <div id="row" >
                                <div id="col-25"> 
                                    Seminar Tag
                                </div>
                                <div id="col-75"> 
                                    <div id="col-30"> 
                                        <label id="container">Business
                                            <input type="checkbox" name="business">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">Charity & Causes
                                            <input type="checkbox" name="charity">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">Family & Education
                                            <input type="checkbox"name="family">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">Fashion
                                            <input type="checkbox" name="fashion">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">Film & Media
                                            <input type="checkbox" name="film">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">Food & Drink
                                            <input type="checkbox" name="fooddrink">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">Goverment
                                            <input type="checkbox" name="goverment">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">Health
                                            <input type="checkbox" name="health">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">Hobbies
                                            <input type="checkbox" name="hobbies">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">Holiday
                                            <input type="checkbox" name="holiday">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">Home & Lifefstyle
                                            <input type="checkbox" name="homelifefstyle">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">Otomotif
                                            <input type="checkbox" name="otomotif">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">School Activies
                                            <input type="checkbox" name="schoolactivies">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">Science & Tech
                                            <input type="checkbox" name="sciencetech">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">Spiritually
                                            <input type="checkbox" name="spiritually">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">Sport & Fitness
                                            <input type="checkbox" name="sportfitness">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                    <div id="col-30"> 
                                        <label id="container">Travel & Outdoor
                                            <input type="checkbox" name="traveloutdoor">
                                            <span id="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="row">
                                <div id="col-25"> 
                                    Seminar Price
                                </div>
                                <div id="col-75"> 
                                    <input type="number" id="semprice" name="semprice" placeholder="How much your seminar event costs" required>
                                </div>
                            </div>

                            <div id="row">
                                <div id="col-25"> 
                                    Seminar Dresscode
                                </div>
                                <div id="col-75"> 
                                    <input type="text" id="semdress" name="semdress" placeholder="Specify your seminar event dresscode" required>
                                </div>
                            </div>

                            <div id="row">
                                <div id="col-25"> 
                                    Banner or Poster
                                </div>
                                <div id="col-75"> 
                                    <input type='file' name="semban" id="semban">
                                </div>
                            </div>

                            <div id="row">
                                <div id="col-25"> 
                                    Certificate Temp
                                </div>
                                <div id="col-75"> 
                                    <input type='file' name="semcert" id="semcert">
                                </div>
                            </div>

                            <div id="row">
                                <div id="col-25"> 
                                </div>  
                                <div id="col-75"> 
                                    <input type="submit" id="chpass" onClick= "#" name="submit" value="Submit My Seminar Event">
                                </div>  
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

    