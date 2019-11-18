<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script type="text/javascript">
var top1;
var left1;
var coordinates = function(element) {
    element = $(element);
	top1 = element.position().top;
	left1 = element.position().left;
	 console.log(left1); //x
	 console.log(top1);// y
}

$(function() {
	$('#box').draggable({
	containment: "#containment", scroll: false,
    start: function() {
        coordinates('#box');
    },
    stop: function() {
        coordinates('#box');
    }
	});

	$('#run').click(function () {
		run(left1,top1);
        });

});
</script>

<style>
	body{
		margin:0;
	}
	canvas{
		display:none;
	}

	#box {
    top: 0;
    left: 0;
    font-size:50px;
	width : 600px;
	text-align:center;
	cursor: move;
	line-height: 0.8;
	}

	#results {
		text-align: center;
	}
	#containment { 
		position:relative;
		background-size: cover;
        background-image: url('./cert.jpg');
		width: 1122px; 
		height:793px;
		background-color:black;
	 }
	 #container{
	
	 }

</style>

</head>
<body>
<div>TEST</div>
	<div id="containment">
		<div id="container">
		<div id="box">The Longest Name Ever Ever</div>
	</div>
</div>


<button id="run">run</button>
<br>
<canvas id="myCanvas"></canvas>

<br>

<button id="download">download</button>
<script type="text/javascript">


function run(parax=0,paray=0) {
	let getobjectwid =  $( "#box" ).width();
	let resobjectwidth = (getobjectwid / 2) + parax;
	console.log(resobjectwidth);
	let canvas = document.querySelector('canvas');
		canvas.width = 1122;//px
		canvas.height = 793;//px
		base_image = new Image();
		base_image.src = './cert.jpg';//d
		context = canvas.getContext('2d');
				base_image.onload = function(){
					context.drawImage(base_image, 0, 0,1122 ,793 );//source,xpos,ypos,width,height
					context.font = "50px Times New Roman";
					context.textBaseline = "top";
					context.textAlign = "center";
					context.fillText("Longest",resobjectwidth,paray);//dynam text, xpos, ypos
					
					}
		
  		setTimeout(function(){
				// only jpeg is supported by jsPDF
				let imgData = canvas.toDataURL("image/jpeg", 1.0);
							let pdf = new jsPDF('landscape');

				pdf.addImage(imgData, 'JPEG', 0, 0);
				pdf.save("download.pdf");//dynamic 
				}, 1000);	
			
}
	


        
</script>

</body>
</html>
