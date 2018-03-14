<?php

session_start(); // 세션
include ("db_connect.php"); // DB접속




$id = $_POST['userID']; // 아이디 
$pw = $_POST['userPassword']; // 패스워드
   
$query = "select * from user_info where Id='$id' and Password='$pw'";
$result = mysqli_query($con, $query); 
$row = mysqli_fetch_array($result);




if($id==$row['Id'] && $pw==$row['Password']){ // id와 pw가 맞다면 login

   $_SESSION['Id']=$row['Id'];
   $_SESSION['Name']=$row['Name'];
   $_SESSION['Tel']=$row['Tel'];
   $_SESSION['Mail']=$row['Mail'];
   $_SESSION['Birthday']=$row['Birthday'];
   echo "<script>location.href='../src/main.html';</script>";

}else{ // id 또는 pw가 다르다면 login 폼으로

   echo "<script>window.alert('invalid username or password');</script>"; // 잘못된 아이디 또는 비빌번호 입니다
   echo "<script>location.href='../src/login.html';</script>";

}

?>
