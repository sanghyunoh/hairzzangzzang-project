<?php
//데이터 베이스 연결하기
include "session.php";

include "db_info.php";

//reserveCondition 테이블로 데이터 입력
$userId = $_POST[id];
$position =$_POST[position];
$name = $_POST[name];
$telephoneNumber = $_POST[telephoneNumber];
$email = $_POST[email];
$url = $_POST[url];
$question = $_POST[question];


$query = "INSERT INTO requestHairShop VALUES ('', '$userId', '$position', '$name', '$telephoneNumber', '$email', '$url', '$question')";
$result = mysqli_query($conn, $query);

echo "<meta http-equiv='Refresh' content='0; URL=./main.html'>";

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>요청완료</title>
</head>
<center>
    <script> 
alert('요청되었습니다.'); 
 
</script> 
</html>