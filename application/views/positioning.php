<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-ui.js"></script>
<style>
	body{
		margin:0;/*dont*/
	}

	#box {
    top: 0;/*dont*/
    left: 0;/*dont*/
	width : 100px;/*dont*/
	height: 100px;/*dont*/
	cursor: move;
	background-color :gray;
	text-align:center

	}
	#name {
    top: 0;/*dont*/
    left: 0;/*dont*/
	width : 600px;/*dont*/
	text-align:left;/*dont*/ 
	cursor: move;
	line-height: 0.8;
	}

	#results {
		text-align: center;
	}
	#containment { 
		position:relative;
		background-size: cover;
		width: 1122px; /*dont*/
		height:793px;/*dont*/
		background-color:black;
	 }
	

</style>

</head>
<body>
<div>Test Position</div>
<input type="number" id="textsize" name="textsize" value="16" placeholder="Text Size">
<select id = "textalgn" name="textalgn">
						<option value="left"selected>Left</option>
						<option value="center">Center</option>
						<option value="right">Right</option>
</select>
<button id="get">Get Position</button>
	<div id="containment" style="background-image: url(<?php echo base_url().'asset/pict/sert_template/'.$sem_id.'.png'; ?>);">
		<div id="name">The Longest Name Ever Ever</div>
		<div id="box">QR CODE</div>
</div>


<script type="text/javascript">
var top1,left1,left2,top2,textalgn,txtsize,resnameleft1,resnametop1;//name,qr
var coordinates = function(element) {
    element = $(element);
	top1 = element.position().top;
	left1 = element.position().left;
	// console.log(left1); //x
	 //console.log(top1);// y
}
var coordinates1 = function(element) {
    element1 = $(element);
	top2 = element1.position().top;
	left2 = element1.position().left;
	// console.log(left2); //x
	// console.log(top2);// y
}


$(function() {
	function getallposition(){

	}
	$('#name').draggable({
	containment: "#containment", scroll: false,
    start: function() {
        coordinates('#name');
    },
    stop: function() {
        coordinates('#name');
    }
	});

	$('#box').draggable({
	containment: "#containment", scroll: false,
    start: function() {
        coordinates1('#box');
    },
    stop: function() {
        coordinates1('#box');
    }
	});

	
		
		
		$('#textalgn').change(function() {
				$('#name').css("text-align", $(this).val());
		});

		$('input[name=textsize]').keyup(function(){
			if($(this).val()<=50){
			$('#name').css('font-size', $(this).val() + 'px');
			txtsize = $(this).val();
			}
			else{
				alert('Maximum Textsize is 50')
			}
        });


	$('#get').click(function() {

		if($("#textalgn").val() == "left"){
				resnametop1 = top1;
				resnameleft1 = left1;
			}
		else if($("#textalgn").val() == "right"){
				let namewidth = $( "#name" ).width();
				resnametop1 = top1;
				resnameleft1 = left1 + namewidth;
			}
		else{
				let namewidth = $( "#name" ).width();
				resnameleft1 = (namewidth / 2) + left1;
				resnametop1 = top1;
			}
			textalgn = $("#textalgn").val();

			let s_id = <?php echo $sem_id?> ;
            $.ajax({
                    url:"<?php echo base_url(); ?>event_detail/getposcert/"+s_id,
                    method:"POST",
                    data:{namex:resnameleft1,namey:resnametop1,qrx:left2,qry:top2,txtalgn:textalgn,textsize:txtsize},
                    success:function(data){
                   alert('Succesfully update position');
                            }
                        });  
	});

});
</script>

</body>
</html>
