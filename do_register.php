<?php
//데이터 베이스 연결하기

include "db_info.php";

//reserveCondition 테이블로 데이터 입력
$userId = $_POST[userId];
$password =$_POST[password];
$name = "알수없음";
$sex = "알수없음";
$age = "알수없음";
$telephoneNumber = $_POST[telephoneNumber];
//$email = "null@null.null";
//$email = $_POST[email];


$query = "INSERT INTO userInformation VALUES ('', '$userId', '$password', '$name', '$sex', '$age', '$telephoneNumber')";
$result = mysqli_query($conn, $query);

echo "<meta http-equiv='Refresh' content='0; URL=./login.php'>";

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