<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/payment.css">
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
        $('#jdrop').on('click', function() {  //.dropdown-content
            let wit = $('#jdrop').width();
            wit += 29.8;
            console.log(wit);
            $("#jcdrop").css("width", wit);
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
    
    ?>   

    <!-- bagian isi  -->
  
    <div id="body">
        <div id="bodyartikel2">
            <div id="rightbody">
                <div id="content">
                    <div id="judul">
                        Ringkasan Tagihan
                    </div>
                    <div id="judul">
                        Rp 35.000
                    </div>
                    <div id="isi">
                        Silahkan lakukan transfer ke rekening berikut.
                        <div id="box">
                            <div id="flex">
                                <img src="../asset/pict/bank/BCA.png">
                                <div id="slot2">
                                    BCA Account
                                </div>
                            </div>
                            <div id="flex2">
                                <div id="namaacc">
                                    Alfa Farhan
                                </div>
                                <div id="noacc">
                                    41517320004 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="leftbody">
                <div id="judul">
                    Pembayaran
                </div>
                <div id="namaseminar">
                    National Youth Summit 
                </div>
                <div id="dateseminar">
                    Fri, 18 October 2019, 05.14
                </div>
                <div id="locseminar">
                    Ballroom Puri Agung, Hotel Grand Sahid Jakarta. Jl. Jend. Sudirman No.Kav. 86, RT.10/RW.11, Karet Tengsin, Jakarta Pusat, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10220
                </div>
                <div id="judul2">
                    Mohon lengkapi data pembayaran anda
                </div>
                <div id="postpembayaran">
                    Pastikan kesesuaian data rekening pengirim dengan rekening yang anda kirimkan. Data yang di input masih dapat anda ubah di event yang anda ikuti. Jika ada ketidaksesuaian data, 
                    kami akan langsung informasikan dari notifikasi. 
                </div>
                <div id="row">
                    <div id="col-25">
                        Nama rekening pengirim
                    </div>
                    <div id="col-75">
                        <input type="text" id="namakirim" name="namakirim">
                    </div>
                </div>
                <div id="row">
                    <div id="col-25">
                        Nama bank pengirim
                    </div>
                    <div id="col-75">
                        <select name="bank" id="bank">
                            <option value="" selected>Not Selected</option>
                            <option value="Mandiri">Bank Mandiri</option>
                            <option value="BNI">Bank Negara Indonesia (BNI)</option>
                            <option value="BRI">Bank Rakyat Indonesia (BRI)</option>
                            <option value="BTN">Bank Tabungan Negara (BTN)</option>
                            <option value="BCA">Bank Central Asia (BCA)</option>
                            <option value="Permata">Bank Permata</option>
                        </select>
                    </div>
                </div>
                <div id="row">
                    <div id="col-25">
                        Nama bank pengirim lainnya
                    </div>
                    <div id="col-75">
                        <input type="text" id="bank2" name="bank2" placeholder="kosongkan jika nama bank terdapat dalam list">
                    </div>
                </div>
                <div id="row">
                    <div id="col-25">
                        No rekening pengirim
                    </div>
                    <div id="col-75">
                        <input type="text" id="norek" name="norek">
                    </div>
                </div>
                <div id="row">
                    <div id="col-25">
                        Bukti pembayaran
                    </div>
                    <div id="col-75">
                        <input type="file" id="buktipem" name="buktipem">
                    </div>
                </div>
                <div id="row">
                    <input type="submit" id="submit" value="Submit">
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