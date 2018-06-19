<?php
//데이터 베이스 연결하기
include "session.php";
include "db_info.php";
$user_id = $_SESSION[userId];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="/css/bar.css">
<script>
    $(document).ready(function(){
        $("#left").click(function(){
            $("#myPage").css("top","0%");
        });
        $(".X").click(function(){
            $("#myPage").css("top","100%");
        });
    
        $(".searchIcon").click(function(){
            $("#searchWindow").removeClass().addClass('showSearchWindow');
        });
        $("#cancelSearch").click(function(){
            $("#searchWindow").removeClass().addClass('hideSearchWindow');
        });
    });
</script>

<div id="topBar">
    <div class="row">
      <div id="left" class="col-xs-3"><img src="/img/icon/home.png"></div>
      <div id="center" class="col-xs-6" style="text-align:center;"><a href="list.php"><img src="/img/icon/overLogo.png" style="width:130px;" /></a></div>
      <div id="right" class="col-xs-3"><img class="searchIcon" src="/img/icon/search.png"/></div>
    </div>

    <div id="myPage">
        <div class="up">
            <div class="X">
                <img src="/img/icon/cross.png" style="width:20px; height:20px;">
            </div>
        </div>
        <div class="middle">
            <img src="/img/mypage.png" style="width:100px;height:100px;">
            <ul>
                <a style="text-decoration:none; color:black;"> <?=$user_id?> 님 환영합니다</a>
            </ul>
        </div>
        <div class="down">
            <ul>
                <li><a href="myPage_new_1.php" style="text-decoration:none; color:black;">마이페이지</a></li>
                <li><a href="requestHairShop.php" style="text-decoration:none; color:black;">제휴문의</a></li>
                <li><a href="serviceCenter.php" style="text-decoration:none; color:black;">고객센터</a></li>
                <li><a href="logout.php" style="text-decoration:none; color:black;">로그아웃</a></li>
                <!--   <li>설정</li> -->

            </ul>
        </div>
    </div>
    <div class="hide" id="searchWindow">
        <form action=findHairShop.php method=post>
            
        <div id="cancelSearch" style="margin-left:15px;margin-top:15px;width:20px;">
            <img src="/img/icon/cross.png" style="width:20px;"/>
        </div>
        <div style="    position: absolute;top: 15px; left: 70px; width: 100%;">
            <input id="search" type="text" name="shopname" placeholder="Search..." autofocus style="border-width: 0px 0px 1px 0px;width:50%;">
        </div>
        <div style="position:absolute;top:15px;right:12px;">
            <input type="image" src="img/icon/search.png" style="width:20px;"/>
        </div>


        </form>
    </div>
</div>