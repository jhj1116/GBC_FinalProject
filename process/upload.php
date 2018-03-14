<?php

session_start(); // 세션


if($_SESSION['Id']==null) { // 로그인 하지 않았다면
	echo "<script>window.alert('login please');</script>"; // 잘못된 아이디 또는 비빌번호 입니다
   echo "<script>location.href='../src/login.html';</script>";


}else{ // 로그인 했다면

require_once("db_connect.php");


$content = $_POST['content'];
$id = $_SESSION['Id'];
$date = date("Y-m-d");



if($content==NULL){
	$empty2 = "내용을 입력해주세요.";
	?>

	<script>
		alert("<?php echo $empty2 ?>");
		history.back();
	</script>

<?php

}

else{

	$check = 0;

	if($_FILES[upload][name]){

		$size = $_FILES['upload']['size'];
		if($size > 2097152) $check = 1; //Error('파일용량: 2MB로 제한합니다.');

		$upload_name = strtolower($_FILES['upload']['name']);

		$upload_split = explode(".",$upload_name);

		$extexplode = $upload_split[count($upload_split)-2.3];
		$upload_type = $upload_split[count($upload_split)-1];

		$img_ext = array('jpg','jpeg','gif','png');

		if(array_search($upload_type, $img_ext) === false)
			$check =1 ;//Error('이미지 파일이 아닙니다.');

		$tates = date("mdhis", time());
		$newupload = chr(rand(97,122)).chr(rand(97,122)).$tates.rand(1,9).rand(1,9).".".$upload_type;

		$dir = "/var/www/html/gbc_project/images/";

		move_uploaded_file($_FILES['upload']['tmp_name'], $dir.$newupload);

		chmod($dir.$newupload, 0777);

	}



$qry = "INSERT INTO board VALUES (NULL,'$content', '$date', '$id', '$newupload')";


$result = mysqli_query($con,$qry);





	if($result==1 && $check==0) { // query가 정상실행 되었다면,
		$msg = "정상적으로 글이 등록되었습니다.";
		$replaceURL = '../src/main.php';
	} else {
		$msg = "글을 등록하지 못했습니다.";
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