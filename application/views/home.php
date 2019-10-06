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
    $(function() {
        function search_seminar() {
        var seminar_search =  $("#seminar").val();
        if(seminar_search.length<=0){
            $('#result').html("");
        }
        else{
            $.ajax({
        url:"<?php echo base_url(); ?>home/search/",
        method:"POST",
        data:{datasearch:seminar_search},
        success:function(data){
        $('#result').html(data);
        console.log(data);}
              });
           
        }
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
    $(document).ready(function() {ceklunch();});
    });

    /* Js custom select smart search */

    var x, i, j, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    for (i = 0; i < x.length; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < selElmnt.length; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        for (k = 0; k < y.length; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
        /*when the select box is clicked, close any other select boxes,
        and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
        });
    }
    
    function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }

    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
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
                <div id="p"> Welcome Alfa ! </div>
                <div id="dropdown">
                    <img id="imgdrop" src="./asset/pict/profile/fajarbarokah98@yahoo.co.id.png">
                
                    <div id="myDropDown" class="dropdown-content">
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
            <div id = "result"></div>
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
