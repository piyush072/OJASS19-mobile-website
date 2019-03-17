
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Event info</title>
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Kumar+One+Outline" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kumar+One+Outline|Satisfy" rel="stylesheet">
		<link rel="shortcut icon" href="ojass_black_nb.png">
		<link rel="stylesheet" type="text/css" href="css/component2.css" />
		<script src="js/modernizr-2.6.2.min.js"></script>
		<script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
		<script type="text/javascript" src="js/firebase.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<style type="text/css">
			.nav-tabs { border-bottom: 2px solid #DDD; }
	.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
	.nav-tabs > li > a { border: none; color: #ffffff;background: black; }
			.nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none;  color: black !important; background: #fff; }
			.nav-tabs > li > a::after { content: ""; background: black; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
	.nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
	.tab-nav > li > a::after { background: black none repeat scroll 0% 0%; color: #fff; }
	.tab-pane { padding: 15px 0; }
	.tab-content{padding:20px}
	.nav-tabs > li  {width:20%; text-align:center;}
	.card {background: #fff none repeat scroll 0% 0%;  margin-bottom: 30px; }
	body{ background:black; padding:0px;color:white;
		font-family: 'Satisfy', cursive;font-size:200%;
		overflow:hidden;}

	@media all and (max-width:724px){
	.nav-tabs > li > a > span {display:none;}
	.nav-tabs > li > a {padding: 5px 5px;}
	}
	.text{
		text-align:center;
		font-family: 'Kumar One Outline', cursive;
		position:relative;
		left:120px;
		padding:0;
		margin-top:0;
	}
	</style>
</head>
	<body >


		<div class="container col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0;overflow-x:hidden;overflow-y: hidden;">

			<img id="image" alt="event" src="b.jpg" style="padding:5%;width:100%;height:auto;" class="responsive">

			<div class="row" id="row" style="display:none;">
		    <div class="col-md-12">
		      <!-- Nav tabs -->
		      <div class="card" style="background:black;" id="cd" style="position:fixed;overflow:hidden;">
		        <ul class="nav nav-tabs" role="tablist" >
		          <li role="presentation" class="active"><a  href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-home"></i>&nbsp; </a></li>
		          <li role="presentation"><a href="#details" aria-controls="details" role="tab" data-toggle="tab"><i class="fa fa-pencil"></i>&nbsp; </a></li>
		          <li role="presentation"><a href="#rules" aria-controls="rules" role="tab" data-toggle="tab"><i class="fa fa-book"></i>&nbsp; </a></li>
		          <li role="presentation"><a href="#prizes" aria-controls="prizes" role="tab" data-toggle="tab"><i class="fa fa-trophy"></i>&nbsp; </a></li>
		          <li role="presentation"><a href="#co" aria-controls="co" role="tab" data-toggle="tab"><i class="fa fa-user"></i>&nbsp;</a></li>
		        </ul>

		        <!-- Tab panes -->
		        <div class="tab-content" style="max-height:300px;overflow-y: auto;">
		          <div role="tabpanel" class="tab-pane active" id="home"><span class="text">About</span><br><span id="hometext"></span></div>
		          <div role="tabpanel" class="tab-pane" id="details"><span class="text">Details</span><br><span id="detailtext"></span></div>
		          <div role="tabpanel" class="tab-pane" id="rules"><span class="text">Rules</span><br><span id="ruletext"></span></div>
		          <div role="tabpanel" class="tab-pane" id="prizes"><span class="text">Prizes</span><br><span id="prizetext"></span></div>
		          <div role="tabpanel" class="tab-pane" id="co"><span class="text" style="left:90px;">Co-ordinators</span><br><span id="cotext"></span></div>
		        </div>
		      </div>
		    </div>
		  </div>
			<!-- Top Navigation -->
			<div class="component" style="background:black;position:relative;top:20px;">
				<!-- Start Nav Structure -->
				<button class="cn-button" id="cn-button" style="position:fixed;top:530px;">Events</button>
				<div class="cn-wrapper" id="cn-wrapper" style="position:fixed;top:530px;">
					<ul class="eve">
					
					<script>
						
							var root = firebase.database().ref();
							root.child('/Events/<?php echo $_GET["key"]; ?>').once('value', function(snap){
									var j=0;var event = snap.key;
									snap.forEach(function(childSnap){
											var e_name = childSnap.key;
											$('.eve').append('<li><a href="#" class="event_name" id="ev'+j+'"><span>'+childSnap.key+'</span></a></li>');
											var id = "#ev"+j;
											j++;						
											$(id).click(function(){
												$('#prizetext').text(" ");
												$('#cotext').text(" ");
												$('#ruletext').text(" ");
												$('#hometext').text(childSnap.child("About").val());
												$('#detailtext').text(childSnap.child("Details").val());
												$('#prizetext').append("First: "+childSnap.child("Prizes").child("First").val()+"<br>Second: "+childSnap.child("Prizes").child("Second").val()+"<br>Third: "+childSnap.child("Prizes").child("Third").val()+"<br>Total: "+childSnap.child("Prizes").child("Total").val());
												root.child('/Events/'+event+'/'+e_name+'/Co-ordinators').once('value', function(snap1){
													snap1.forEach(function(childSnap1){
													$('#cotext').append(childSnap1.key+" : "+childSnap1.val()+"<br>");});
												});
												root.child('/Events/'+event+'/'+e_name+'/Rules').once('value', function(snap1){
													snap1.forEach(function(childSnap1){
													$('#ruletext').append(childSnap1.key+" : "+childSnap1.val()+"<br>");});
												});
											});
									});
									var i=1;var a = 30;var b= -30;
									for(i=1;i<=j;i++){
										$('.eve li:nth-child('+i+')').css({
											'-webkit-transform' : 'rotate('+b+'deg) skew(60deg)',
											'-moz-transform'    : 'rotate('+b+'deg) skew(60deg)',
											'-ms-transform'     : 'rotate('+b+'deg) skew(60deg)',
											'transform'         : 'rotate('+b+'deg) skew(60deg)'
										});
										b+=a;
									}
							});
							
				</script>
				
					</ul>
				</div>
				<!-- End of Nav Structure -->
			</div>

		


			<script type="text/javascript">
				$(document).ready(function(){
					$('.eve').click(function(){
						$('#row').css("display","block");
						$('#image').css("display","none");
					});
				});
			</script>
		</div><!-- /container -->
		<script src="js/polyfills.js"></script>
		<script src="js/demo2.js"></script>
		
	</body>
</html>
