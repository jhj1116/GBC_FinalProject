<?php

session_start(); // 세션

if($_SESSION['Id']==null) { // 로그인 하지 않았다면
	echo "<script>window.alert('login please');</script>"; // 잘못된 아이디 또는 비빌번호 입니다
   echo "<script>location.href='login.html';</script>";


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

	.container
	{
		width: 600px;
		height: 100px;
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
         
         <li class = "active"><a href = "main.php">&nbsp TIMELINE &nbsp <span class = "sr-only"></span></a></li>
         <li><a href= "photo.php">&nbsp PHOTOS &nbsp</a></li>
         <li><a href= "map.php">&nbsp MAP &nbsp</a></li>
         <li><a href= "callendar.php" >&nbsp CALLENDAR &nbsp</a></li>
         
         <li class = "dropdown">
         </li>


      </ul>
      <div id="logoutbutton">
         <form name="logout" action="../process/logout.php" method="get">
            <input type="image" src="../images/off.png" alt="logout button" width="35" height="35">
         </form>
      </div>
   </div>
</nav>



<div class ="row"
                     text-align     :left">
	<div class = "col-md-6">
<section id="cd-timeline">
	<div class="cd-timeline-block" style="vertical-align :middle;
                     text-align     :right">
		
 
		<div class="cd-timeline-content" style="vertical-align :middle;
                     text-align     :left">



			<?php

				include("../process/db_connect.php");
				$im = $_SESSION['Id'];
				$query = "SELECT * from board WHERE Id LIKE '$im' order by no desc";
				$result = mysqli_query($con, $query);
				

            
           function expandTable($content,$no){

           	$content_len = mb_strlen($content, 'utf-8');

           	if($content_len > 80){
              	$content = mb_substr($content, 0, 80, 'utf-8');
              }

              $html = "<div class=\"container\"><div class = \"cd-timeline-block\" style = \"border:0.5px solid gray\"></div><tr><td>";
              


              $html .= nl2br($content)."</td></tr><a href='./viewer.php?no=".$no."' class=\"cd-read-more\">Read more</a>
              </div><br>";

              return $html;
            }

            while ($row = mysqli_fetch_row($result)) {
            echo expandTable($row[1],$row[0]);
            }


?>
			
		</div> <!-- cd-timeline-content -->
	</div> <!-- cd-timeline-block -->
 
	<div class="cd-timeline-block">
		<!-- ... -->
	</div>
</section>

	</div>

		<div class = "col-md-6">
		<table  width="400" border="0" cellspacing="0">
   
   <!--
    <form name = "save" action ="../process/upload.php" method = "post" enctype="multipart/form-data">
    <input type="hidden" value="<?=$_SESSION['Id']?>" name="id"/>
-->
	<form action="../process/upload.php" method="POST" enctype="multipart/form-data">
	
    <tr>
        <td><textarea style="border: none" name="content" cols="70" rows="40" ></textarea></td>
    </tr>

    
    	
    	<!--<input type = "file" name="fileToUpload" accept = "image/jpg, image/gif">-->
    	<input type="file" name="upload"/>


    	<input type = "submit" name = "save" value = "Save" border = "0"> 
    </form>





</table>

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


