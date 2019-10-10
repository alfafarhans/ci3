<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../asset/css/profile.css">
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
        //select tag
        var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("id", "sell");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 0; j < selElmnt.length; j++) {
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
            ceklunch(); // call funtion
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
        function search_seminar(search,result) {
           // console.log(search);
        if(search.length<=0){
            $(result).html("");
        }
        else{
            $.ajax({
        url:"<?php echo base_url(); ?>home/search/",
        method:"POST",
        data:{datasearch:search,type:result},
        success:function(data){
        $(result).html(data);
        //console.log(data);
        }
              });
           
        }
            }
        
        //ALL TRIGEER
        
        $('#jdrop').on('click', function() {
            $('#jcdrop').slideDown( "slow" );
        });
        $('#seminar').on('keyup', function() {
            var res = '#result_sem';
            //console.log($(this).val());
            search_seminar($(this).val(),res);
        });
        $('#location').on('keyup', function() {
            var res = '#result_loc';
            //console.log($(this).val());
            search_seminar($(this).val(),res);
        });
    $(document).ready(function() {ceklunch();});
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
                    <a href="#"> Settings </a> 
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
                    <a href="<?php echo base_url();?>index.php/profile"> Profile </a>
                </div>
                <div id="objleft">
                    <a href="<?php echo base_url();?>index.php/my_event"> My Events </a>
                </div>
                <div id="objleft">
                    <a href="#"> Settings </a>
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
                <?php
                foreach ($userdata->result_array() as $value) {
                 $firstnamefill = str_replace(" ","&nbsp;",$value['first_name']);
                 $name = ucwords($firstnamefill."&nbsp;".$value['last_name']);
        echo '<div id="row">
        <div id="col-25"> 
            Profile Picture
        </div>
        <div id="avatar"> 
            <img src="../asset/pict/profile/'.$user_id.'.png"> 
        </div>
        <div id="upload"> 
            <input type="file" name="profilepic">
        </div>
    </div>

    <div id="row">
        <div id="col-25"> 
            Nama 
        </div>
        <div id="col-75"> 
            <input type="text" id="firstname" name="firstname" value='.$name.'>
        </div>
    </div>

    <div id="row">
        <div id="col-25"> 
            Tanggal Lahir
        </div>
        <div id="col-75"> 
            <input type="date" id="email" name="tanggallahir">
        </div>
    </div>

    <div id="row">
        <div id="col-25"> 
            Jenis Kelamin
        </div>
        <div id="col-75"> 
            <select name="sex">
                <option value="pria" selected> Laki-Laki </option>
                <option value="wanita"> Perempuan </option>
            </select>
        </div>
    </div>

    <div id="row">
        <div id="col-25"> 
            Alamat
        </div>
        <div id="col-75"> 
            <textarea name="alamat" style="height: 200px;" value="Jl KH Noer Ali No.1 Jakasampurna Bekasi Barat"></textarea>
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