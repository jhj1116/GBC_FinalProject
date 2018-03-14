<?php
  include("db_connect.php");

  $id = $_POST['ID']; //sign up.html에서 지정한 변수이름으로 교체해야.
  $pw = $_POST['Password'];
  $pw2 = $_POST['AgainPassword'];
  $name = $_POST['Name'];
  $birthday = $_POST['Date'];
  $tel = $_POST['Tel'];
  $mail = $_POST['InputEmail'];


  if($id==NULL || $pw==NULL || $pw2==NULL || $name==NULL || $birthday==NULL){
  $empty = "필수 항목을 채워주세요.";
?>

  <script>
    alert("<?php echo $empty ?>");
    history.back();
  </script>


<?php

}

if($pw!=$pw2){
  $neq = "비밀번호가 일치하지 않습니다.";

  ?>
  <script>
    alert("<?php echo $neq ?>");
    history.back();
  </script>

<?php

}

  else{

  $checking = "SELECT Id FROM user_info WHERE Id LIKE '$id'";

  $check = mysqli_query($con,$checking);
  $rst = mysqli_fetch_row($check);
  if($rst!=NULL){
    $ext = "이미 존재하는 아이디입니다.";


    ?>

    <script>
    alert("<?php echo $ext ?>");
    history.back();
    </script>

  <?php
  }


  else{

  $qry = "INSERT INTO user_info VALUES ('$id', '$pw', '$name', '$birthday', '$tel', '$mail')";


  $result = mysqli_query($con,$qry);


  if($result) { // query가 정상실행 되었다면,
    $msg = "정상적으로 등록되었습니다.";
    $replaceURL = '../src/login.html';
  } else {
    $msg = "등록하지 못했습니다.";
  ?>
  
  <script>
    alert("<?php echo $msg ?>");
    history.back();
  </script>

  <?php
    }
  ?>
  
  <script>
  alert("<?php echo $msg?>");
  location.replace("<?php echo $replaceURL ?>");
  </script>

  <?php
    }
  }
  ?>