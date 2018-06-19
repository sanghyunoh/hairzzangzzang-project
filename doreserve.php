<?php
//데이터 베이스 연결하기
include "db_info.php";
include "session.php";
//reserveCondition 테이블로 데이터 입력
$keyValue = $_GET[keyValue];
$type =$_POST[type];
$type2 =$_POST[type2];
$date = $_POST[datepicker];
$reserveMonth = substr($date,0,2);
$reserveDay = substr($date,3,2);
$reservetime = $_POST[time];
$request = $_POST[request];
$user_id = $_SESSION[userId];//테스트

//$query = "SELECT * FROM hairShop $keyValue = hairShop.keyValue AND INSERT INTO ReserveCondition VALUES ('', '$keyValue', '$type', '$reserveDay', '$reserveMonth', '$time', '$request', '$user_id', 'hairShop.shopName', 'hairShop.telephoneNumber', now())";

$query = "INSERT INTO ReserveCondition (id,keyValue,type,type2,reserveDay,reserveMonth,reserveTime,request,user_id,nowDate,reservecondition) 
VALUES ('', '$keyValue', '$type', '$type2', '$reserveDay', '$reserveMonth', '$reservetime', '$request', '$user_id', now(),'예약요청')";

$result = mysqli_query($conn, $query);
/*
//reserveCondition의 id값 가져오기
$query = "SELECT id FROM ReserveCondition ORDER BY id DESC";
$result2 = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result2);
$id = $row[id];

//userData 테이블로 데이터 입력
$userName = $_POST[userName];
$sex = $_POST[sex];
$phoneNumber = $_POST[phoneNumber];
$email = $_POST[email];
$user_id = $_SESSION[userId];

$query2 = "INSERT INTO userData (id, user_id, email, name, sex, phoneNumber1) VALUES ('$id','$user_id', '$email', '$userName', '$sex', '$phoneNumber')";
$result = mysqli_query($conn, $query2);
*/
echo "<meta http-equiv='Refresh' content='0; URL=info.php?keyValue={$keyValue}'>";
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>예약중</title>
</head>
<center>
    <script> 
alert('예약되었습니다.'); 
window.close(); 
</script> 
</html>