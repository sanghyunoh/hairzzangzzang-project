<?php
//데이터 베이스 연결하기
include "db_info.php";
include "session.php";
$user_id = $_SESSION[userId];
?>

<link rel="stylesheet" type="text/css" href="/css/bar.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#myMenu").click(function(){
            $("#myPage").css("top","0%");
        });
        $(".X").click(function(){
            $("#myPage").css("top","100%");
        });
    });
</script>
<!--상단 메뉴바-->
<div id="topBar">
    <div id="myMenu">
    
    <img src="/img/icon/home.png">

    </div>
    <div id="myPage">
        <div class="up">
            <div class="X">X</div>
            
        </div>
        <div class="middle">
            <img src="/img/mypage.png" style="width:100px;height:100px;"></a>
            <ul>
                <a><?=$user_id?> 님 환영합니다</a>
            </ul>
        </div>
        <div class="down">
            
            <ul>
                <li>예약확인</li>
                <li>내 쿠폰함</li>
                <li>마이 샵 관리</li>
                <li>제휴문의</li>
                <li>고객센터</li>
                <li>설정</li>
                <li>로그아웃</li>
            </ul>
        </div>
    </div>
    
    
    <div id="logo">
        <a href="list.php"><img src="/img/icon/overLogo.png" style="width:130px;"></a>
    </div>
    
    <div>
        <input type="checkbox" id="searchToggle">
        <label for="searchToggle" class="searchIcon"><img src="/img/icon/search.png"></label>
        
        <div class="searchWindow">
            	<form action=findHairShop.php method=post>
                    <input id="search" type="text" name="shopname" placeholder="Search..." >
                    <button id="searchBtn" >검색</button>
                </form>
        </div>
    </div>
</div>
