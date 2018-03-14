<?php

session_start(); // 세션


if($_SESSION['Id']==null) { // 로그인 하지 않았다면
	echo "<script>window.alert('login please');</script>"; // 잘못된 아이디 또는 비빌번호 입니다
   echo "<script>location.href='../src/login.html';</script>";


}else{ // 로그인 했다면

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width = device - width", initial - scale = "1">
	<title>Joeun</title>
	<link rel = "stylesheet" href = "../css/bootstrap.css">
	<link rel = "stylesheet" href = "../css/codingbooster.css">

</head>
<body>

	<style type = "text/css">
	body
	{
		background-color: #FAFAFA;

	}

	img
	{
		width : 80px;
		height: 80px;
	}
	.navbar-brand{
		background-image: url('../images/off.png'); 
		background-size: cover;
	
		
	}

	.navbar-right
	{
		background-image: url('../images/off.png'); 
		background-size: auto;


	}
	.btn-image
	{
		background-image: url('../images/off.png'); 
		background-size: auto;


	}

	#map {
        height: 600px;
        width: 100%;
        margin : 10px 10% 10px 40%;
    	}

	#logoutbutton
	{
		margin:8px 0px 0px 96%;
	}

	#left
	{
		color : black;
		border: white;
		float : left;
		border : lightgray;
	}

	#right
	{
		color : black;
		border: white;
		float : right;
		border : lightgray;

	}
</style>
<nav class = "navbar navbar-default">
	<div class = "container-fluid">
		<div class = "navbar-header">
			<button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse"
			data-target = "#bs-example-navbar-collapse-1" aria-expanded = "false" >
			<span class = "sr-only"></span>
			<span class = "icon-bar"></span>
			<span class = "icon-bar"></span>
			<span class = "icon-bar"></span>
		</button>
	</div>


	<dlv class = "collapsed navbar-brand-collapse" id = "bs-example-navbar-collapse-1">
		<ul class = "nav navbar-nav">
			
			
			<li><a href= "main.php">&nbsp; TIMELINE  &nbsp</a></li>
			<li><a href= "photo.php">&nbsp PHOTOS &nbsp</a></li>
			<li class = "active"><a href = "map.php">&nbsp MAP &nbsp <span class = "sr-only"></span></a></li>
			<li><a href= "callendar.php" >&nbsp CALLENDAR &nbsp</a></li>
			


		</ul>
		<div id="logoutbutton">
			<form name="logout" action="logout.php" method="get">
				<input type="image" src="../images/off.png" alt="logout button" width="35" height="35">
			</form>
		</div>
	</div>
</nav>


<div class ="row">
	<div class = "col-md-6">
<section id="cd-timeline">
	<div class="cd-timeline-block">
		
 
		<div class="cd-timeline-content">
			<div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMIfugPnD-r028_O-OrSd4y2AQoJG2LpU&callback=initMap">
    </script>
			
		</div> <!-- cd-timeline-content -->
	</div> <!-- cd-timeline-block -->
 
	<div class="cd-timeline-block">
		<!-- ... -->
	</div>
</section>

	</div>

		
</div>



<footer style = "background-color:  #DAD9D9; color: #000000">
	<div class = "row">
		<div class = "col-sm-2" style ="text-align: center;"><h5>Copyright &copy; 2018</h5>
			<h5>GHOST 24 </h5></div>
		<div class = "col-sm-4"><h4>developer</h4><p>김수용 유진주 정혜진 천재홍</p></div>
		<div class = "col-sm-30" style = "text-align: center;"><h5>Joeun, for schedule </h5>
		</div>
	</div>
</div>
</footer>


<script src = "http://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src = "js/bootstrap.js"></script> 
</body>
</html>



<?php
	}

?>



