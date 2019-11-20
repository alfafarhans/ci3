<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/profile.css">
    <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>asset/js/jspdf.min.js"></script>
	<style>
    .status{
        display:none;
    }
    </style>
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
                    ';
                    $path = './asset/pict/profile/'.$user_id.'.png';
        if(file_exists($path)){
                   echo' <img id="jdrop" class="imgdrop" src="'.base_url().'asset/pict/profile/'.$user_id.'.png">
                ';}
                else{
                    echo' <img id="jdrop" class="imgdrop" src="'.base_url().'asset/pict/profile/default.png">
                ';
                }
    if( (!empty($user_id)) && ($user_id == 7320006)  ){
                    echo'
                 </div>
                <div id="jcdrop" class="dropdown-content">
                <a href="'.base_url().'profile_admin/Admin"> Profile </a> 
                <a href="'.base_url().'logout"> Sign Out </a></div>
                </div>
            </div> ';
                    }
             else{
                echo'</div>
                       <div id="jcdrop" class="dropdown-content">
                       <a href="'.base_url().'profile/myprofile/1"> Profile </a> 
                       <a href="'.base_url().'profile/myprofile/2"> My Event </a> 
                       <a href="'.base_url().'profile/myprofile/3"> Settings </a> 
                       <a href="'.base_url().'logout"> Sign Out </a></div>
                       </div>
                   </div> ';
                    }
//$("a:visited").parent("li").addClass("is_visited");        
    ?>

    <!-- bagian isi  -->
    <div id="body">
        <div id="bodyartikel2">
            <div id="leftbody">
                <div class="objleft">
                    <a href="javascript:void(0);" id ="profile"> Profile </a>
                </div>
                <div class="objleft">
                    <a href="javascript:void(0);" id ="myevent"> My Events </a>
                </div>
                <div class="objleft">
                    <a href="javascript:void(0);" id ="setting"> Settings </a>
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
    <canvas style="display:none;"></canvas>
    <script type="text/javascript">
    
                window.onclick = function(event) {
                    if ( (!event.target.matches('.dropdown')) &&(!event.target.matches('.imgdrop')) && (!event.target.matches('.result_sem')) && (!event.target.matches('.result_loc')) && (!event.target.matches('.p')) ){
                        $('#jcdrop').slideUp("fast");1
                        $("#result_sem").html("");
                        $("#result_loc").html("");
                        $('#seminar').val("");
                        $('#location').val("");
                    }
                }

                

                $(function() {
                    window.val = function(val_el) {
                        let el =  document.getElementsByClassName("status")[0];
                        if ((typeof(el) != 'undefined') && (el != null) && (val_el==""))
                        {  // $('#status').css("display", "none");
                            el.style.display="none";
                        } 
                        else if((val_el=="Worker") || (val_el=="Student") && (typeof(el) == 'undefined') && (el == null)  ){
                            el.style.display="block";
                           // $('#status').css("display", "block");
                    /*let fragment = document.createDocumentFragment();

                    let elementdiv = document.createElement("DIV"); 
                    elementdiv.setAttribute("id", "row");
                    elementdiv.classList.add('nodests');
                    document.getElementById ("objright2").insertBefore (elementdiv, document.getElementsByClassName("sts")[0].nextSibling);
                    
                    let elementdiv25 = document.createElement("DIV"); 
                    elementdiv25.setAttribute("id", "col-25");

                    let elementdiv75 = document.createElement("DIV"); 
                    elementdiv75.setAttribute("id", "col-75");
                    elementdiv75.classList.add('nodests75');

                    fragment.appendChild(elementdiv25);
                    fragment.appendChild(elementdiv75); 
                    document.getElementsByClassName("nodests")[0].appendChild(fragment);

                    let input = document.createElement("INPUT"); 
                    input.setAttribute("type", "text");
                    input.setAttribute("name", "status");
                    input.setAttribute("id", "Status");
                    document.getElementsByClassName("nodests75")[0].appendChild(input);*/
                        }
                   
                    
                }
                    if(document.URL.indexOf("#")==-1)
                        {
                        // Set the URL to whatever it was plus "#".
                        url = document.URL+"#";
                        location = "#";

                        //Reload the page
                        location.reload(true);

                        }
                
                        window.get_cer = function(u_id,s_id) {
                            let private_stuff = function(sourcen,coordxn,coordyn,sourceqr,coordxqr,coordyqr,sem_name,complatename) {
                            //console.log('oke');

                                    function loadImages(source,callback) {
                                    var images = {};
                                    var loadedImages = 0;
                                    var numImages = 0;
                                    // get num of sources
                                    for(var src in sources) {
                                    numImages++;
                                    }
                                    for(var src in sources) {
                                    images[src] = new Image();
                                    images[src].onload = function() {
                                        if(++loadedImages >= numImages) {
                                        callback(images);
                                        }
                                    };
                                    images[src].src = sources[src];
                                    }
                                }

                                let canvas = document.querySelector('canvas');
                                    canvas.width = 1122;//px
                                    canvas.height = 793;//px
                                    context = canvas.getContext('2d');

                                var sources = {
                                    background : sourcen,//d
                                    qrcode : "http://localhost/ci3/profile/renderqr/"+sourceqr
                                };

                                loadImages(sources, function(images) {
                                    context.drawImage(images.background, 0, 0,1122 ,793);
                                    context.drawImage(images.qrcode, 1000, 660,100 ,100);
                                    context.font = "50px Times New Roman";
                                    context.textBaseline = "top";
                                    context.textAlign = "center";
                                    context.fillText(complatename,coordxn,coordyn);//dynam text, xpos, ypos
                                });

                                    setTimeout(function(){
                                    // only jpeg is supported by jsPDF
                                    let imgData = canvas.toDataURL("image/jpeg", 1.0);
                                                let pdf = new jsPDF('landscape');

                                    pdf.addImage(imgData, 'JPEG', 0, 0);
                                    pdf.save(sem_name+".pdf");//dynamic 
                                    }, 1000);	
                             };

                            $.ajax({
                            url:"<?php echo base_url(); ?>profile/verfy_cer/",
                            method:"POST",
                            data:{user:u_id,seminar:s_id},
                            success:function(data){
                            var responParse = JSON.parse(data);
                                //console.log(responParse.source);
                                //console.log(responParse.msg);
                                // console.log(responParse.status);
                            private_stuff(responParse.source, responParse.cnx, responParse.cny,responParse.bk_id,responParse.cqrx,responParse.cqry,responParse.sem_name,responParse.complatename);

                                    }
                                });
                        }

                    //seminar seacr

                    window.search_seminar = function(search) {
                    if(search.length<=0){
                        $('#result_sem').html("");
                    }
                    else{
                        $.ajax({
                    url:"<?php echo base_url(); ?>home/search/1",
                    method:"POST",
                    data:{datasearch:search/*,type:result*/},
                    success:function(data){
                    $('#result_sem').html(data);
                    //console.log(data);
                            }
                        });
                    
                    }
                        }
                    
                    window.chpassed = function(){
                        let passwordold = $('#passwordold').val();
                        let passwordnew = $('#passwordnew').val();
                        let email = $('#email').val();
                        $.ajax({
                        url:"<?php echo base_url(); ?>profile/chpasswr",
                        method:"POST",
                        data:{passwordold1:passwordold,passwordnew1:passwordnew,email1:email},
                        
                        success:function(data){
                            var responParse = JSON.parse(data);
                                    if( responParse.msg == "Yeay!"  ){
                                        alert(responParse.msg);
                                        alert('Well Played !');
                                        window.location.replace("<?php echo base_url();?>profile/myprofile/3");
                                    }
                                    else{
                                        alert(responParse.msg);
                                    }
                            
                                }
                        }); 
                    }
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
                $('#jdrop').on('click', function() {  //.dropdown-content
                        let wit = $('#jdrop').width();
                        wit += 29.8;
                        console.log(wit);
                        $("#jcdrop").css("width", wit);
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
                
                });//endJS

                function chpass(){
                    chpassed();
                }
               
    </script>
</body>
</html>