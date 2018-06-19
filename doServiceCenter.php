<?php
//데이터 베이스 연결하기
include "db_info.php";
include "session.php";
$question = $_POST[question];
$user_id = $_SESSION[userId];

$query = "INSERT INTO serviceCenter VALUES ('', '$user_id','$question')";

$result = mysqli_query($conn, $query);


echo "<meta http-equiv='Refresh' content='0; URL=list.php'>";
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>요청중</title>
</head>
<center>
    <script> 
alert('요청되었습니다..'); 
</script> 
</html>