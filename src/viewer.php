<?php

session_start(); // 세션

$no = $_GET['no'];


if($_SESSION['Id']==null) { // 로그인 하지 않았다면
	echo "<script>window.alert('login please');</script>"; // 잘못된 아이디 또는 비빌번호 입니다
   echo "<script>location.href='login.html';</script>";


}else{ // 로그인 했다면

$no = $_GET['no'];

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



<?php

include ("../process/db_connect.php");
$query = "select * from board where no=$no";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if($row['no']==NULL){
	echo "존재하지 않는 페이지 입니다.";
}

else{
 
?>

<div id="content">
      <div id="first"><?php echo $row['date']."<br>";?></div>
        <div id="article">


        	 <?php
           function expandTable($photo){

           	
              $html = "<div class=\"container\"><tr><td>";
              


              $html .= "<img src=\"../images/$photo\" />"."</td></tr></div>";

              return $html;
            }


            	if($row['file']!= Null) echo expandTable($row['file']);
            
            ?>

        </div>
          <div id="post">
            <?php echo "<br>".$row['content'];?>
          </div>
          <br>

          <input type="button" name="back" value="목록" onclick="window.location.href='./main.php'"/>

<?php
          if($_SESSION['Id'] == $row['Id']){

            if(array_key_exists('remove',$_POST)){
                //make query
                $sql = "DELETE FROM board WHERE no = $no";
                $result = mysqli_query($con,$sql);

                if(!$result){
                  echo"<script>alert(\"Database Error\");history.back();</script>";
                }
                else{
                  echo"<script>alert(\"Successfully removed\");";
                  echo "location.href='./main.php';</script>";
                }
            }
            echo "<form method='POST'>";
            echo "<div class='button-container'>";
            echo "<button name='remove'>삭제</button></div></form>";          

          }

          ?>



<?php
}

}
?>