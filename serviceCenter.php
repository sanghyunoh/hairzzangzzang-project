<!DOCTYPE html>
<?php
//데이터 베이스 연결하기
include "session.php";

include "db_info.php";

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>건의사항</title>
    
    <link rel="stylesheet" type="text/css" href="/css/serviceCenter.css">
    <link rel="stylesheet" type="text/css" href="/css/font.css">
        
</head>
<body>
    
<form action=doServiceCenter.php method=post>
    
        <!--요청사항-->
        <div class="topBar" >건의사항</div>
        <div class="subtopbar">항상 고객의 소리에 귀기울이겠습니다^^ <br>피드백을 주신분들 중 매달 한분께 추첨을 통해 선물을 드립니다^^</div>
        
        <textarea id="textArea" name ="question" class="select"></textarea>
        

        <!--버튼-->
        <button id="reserveButton">건의하기</button>
    
</body>
</html>