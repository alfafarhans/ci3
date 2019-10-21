<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/payment.css">
    <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
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
    <?php if(!empty($user_id))
    {
      
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
                <a href="'.base_url().'profile_admin/"> Profile </a> 
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
                    <?php 
                        foreach ($seminar as $value) {
                            echo 'Rp&nbsp;'.$value['seminar_price'];
                        }
                        ?>
                    </div>
                    <div id="isi">
                        Silahkan lakukan transfer ke rekening berikut.
                        <div id="box">
                            <div id="flex">
                                <img src="<?= base_url(); ?>asset/pict/bank/BCA.png">
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
                <?php 
                    foreach ($seminar as $value) {
                        //$dayname = date('l', strtotime($value['seminar_date']));
                        $daynum = date('d', strtotime($value['seminar_date']));
                        $mounth = date('F', strtotime($value['seminar_date']));
                        $year = date('Y', strtotime($value['seminar_date']));
                        $hours =  date('H', strtotime($value['seminar_date']));
                        $minute =  date('i', strtotime($value['seminar_date']));

                     echo '<div id="namaseminar">
                            '.$value['seminar_name'].' 
                        </div>
                        <div id="dateseminar">
                        '.$daynum.'&nbsp;'.$mounth.'&nbsp;'.$year.', &nbsp;'.$hours.'.'.$minute.'
                        </div>
                        <div id="locseminar">
                        '.$value['seminar_held'].'
                        </div>';
                    }
                ?>
                 <?php 
                    foreach ($seminar as $value) {
                        echo '<form method="post" action="'.base_url().'payment/updata/'.$value['payment_id'].'/'.$s_id.'" enctype="multipart/form-data">';
                     }
            ?>
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
                        <input type="text" id="namakirim" name="billname">
                    </div>
                </div>
                <div id="row">
                    <div id="col-25">
                        Nama bank pengirim
                    </div>
                    <div id="col-75">
                    <!--errr-->
                        <select name="billbank" id="bank1">
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
                    <!--errr-->
                        <input type="text" id="bank2" name="billbank" placeholder="kosongkan jika nama bank terdapat dalam list">
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
                        <input type="file" id="buktipem" name="buktiimg">
                    </div>
                </div>
                <div id="row">
                    <input type="submit" id="Submit" value="Submit">
                </div>
                </form>
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