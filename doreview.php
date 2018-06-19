<?php
//데이터 베이스 연결하기
include "db_info.php";
include "session.php";
//reserveCondition 테이블로 데이터 입력
$keyValue = $_GET[keyValue];

$star = $_POST[star];
$content = $_POST[content];

$user_id = $_SESSION[userId];//테스트

$query = "INSERT INTO review VALUES ('', '$keyValue', '$user_id', '$content', '$star', now())";

$result = mysqli_query($conn, $query);

echo "<meta http-equiv='Refresh' content='0; URL=info.php?keyValue={$keyValue}'>";
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>리뷰 작성중</title>
</head>
<center>
    <script> 
alert('리뷰가 작성되었습니다.'); 
</script> 
</html>