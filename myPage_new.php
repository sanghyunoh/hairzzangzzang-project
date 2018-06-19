<?php
//데이터 베이스 연결하기
include "db_info.php";
include "session.php";
$user_id = $_SESSION[userId];
$query = "SELECT * FROM ReserveCondition 
INNER JOIN hairShop ON ReserveCondition.keyValue = hairShop.keyValue
WHERE ReserveCondition.user_id = '$user_id'";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
$today_month = date("n");
$today_day = date("j");
?>

<html>
<style>
.buttonnotchoice {
border: 0;
outline: 0;/*---테두리 정의---*/
background-Color:#ffffff;   /*--백그라운드 정의---*/
font:12px 나눔 고딕;      /*--폰트 정의---*/
font-weight:bold;   /*--폰트 굵기---*/
color:#e1716f;    /*--폰트 색깔---*/
width:148.5;height:27;  /*--버튼 크기---*/
}
.buttonchoice {
border: 0;
outline: 0;/*---테두리 정의---*/
background-Color:#e1716f;   /*--백그라운드 정의---*/
font:12px 나눔 고딕;      /*--폰트 정의---*/
font-weight:bold;   /*--폰트 굵기---*/
color:#ffffff;    /*--폰트 색깔---*/
width:148.5;height:27;  /*--버튼 크기---*/
}
.buttondetail {
border: 0;
outline: 0;/*---테두리 정의---*/
background-Color:#9c9c9c;   /*--백그라운드 정의---*/
font:12px 나눔 고딕;      /*--폰트 정의---*/
font-weight:bold;   /*--폰트 굵기---*/
color:#ffffff;    /*--폰트 색깔---*/
width:100;height:20;  /*--버튼 크기---*/
}
.buttoncancel {
border: 0;
outline: 0;/*---테두리 정의---*/
background-Color:#e1716f;   /*--백그라운드 정의---*/
font:12px 나눔 고딕;      /*--폰트 정의---*/
font-weight:bold;   /*--폰트 굵기---*/
color:#ffffff;    /*--폰트 색깔---*/
width:100;height:20;  /*--버튼 크기---*/
}
</style>

<head>
    <link rel="stylesheet" type="text/css" href="/css/font.css">
    <meta charset="UTF-8">
    <title>마이페이지</title>
    <script>
        function roundTable(objID) {
        var obj = document.getElementById(objID);
        var Parent, objTmp, Table, TBody, TR, TD;
        var bdcolor, bgcolor, Space;
        var trIDX, tdIDX, MAX;
        var styleWidth, styleHeight;
        // get parent node
        Parent = obj.parentNode;
        objTmp = document.createElement('SPAN');
        Parent.insertBefore(objTmp, obj);
        Parent.removeChild(obj);
        // get attribute
        bdcolor = obj.getAttribute('rborder');
        bgcolor = obj.getAttribute('rbgcolor');
        radius = parseInt(obj.getAttribute('radius'));
        if (radius == null || radius < 1) radius = 1;
        else if (radius > 6) radius = 6;
        MAX = radius * 2 + 1;
        Table = document.createElement('TABLE');
        TBody = document.createElement('TBODY');
        Table.cellSpacing = 0;
        Table.cellPadding = 0;
        for (trIDX=0; trIDX < MAX; trIDX++) {
            TR = document.createElement('TR');
            Space = Math.abs(trIDX - parseInt(radius));
                for (tdIDX=0; tdIDX < MAX; tdIDX++) {
                    TD = document.createElement('TD');
                    styleWidth = '1px'; styleHeight = '1px';
                    if (tdIDX == 0 || tdIDX == MAX - 1) styleHeight = null;
                    
                    else if (trIDX == 0 || trIDX == MAX - 1) styleWidth = null;
                    
                    else if (radius > 2) {
                        if (Math.abs(tdIDX - radius) == 1) styleWidth = '2px';
                            if (Math.abs(trIDX - radius) == 1) styleHeight = '2px';
                    }
                    
                    if (styleWidth != null) TD.style.width = styleWidth;
                    
                    if (styleHeight != null) TD.style.height = styleHeight;
    
                    if (Space == tdIDX || Space == MAX - tdIDX - 1) TD.style.backgroundColor = bdcolor;
    
                    else if (tdIDX > Space && Space < MAX - tdIDX - 1) TD.style.backgroundColor = bgcolor;
                    
                    if (Space == 0 && tdIDX == radius) TD.appendChild(obj);
                    TR.appendChild(TD);
                }
                TBody.appendChild(TR);
            }

            Table.appendChild(TBody);
    // insert table and remove original table
        Parent.insertBefore(Table, objTmp);
        }
    </script>
</head>
<center>
<body>
    <?php
        //include "topBar.html";
        include "topBar.php";
        ?>
   
    <br>
    <br>
    <br>
    <table id="ta" cellpadding=0 cellspacing=0 width="300" height="30" border="0" radius="3" rborder="" rbgcolor="#e1716f">
            <td valign="center" align ="center">
                <!--<table id="tab" cellpadding=0 cellspacing=0 width="148.5" height="27" border="0" radius="3" rborder="" rbgcolor="e1716f">-->
                    <td align="center"><input type="button" value="예약현황" class="buttonchoice" ></td>

            </td>
            <td valign="center" align ="center">
                    <td align="center"><input type="button" value="지난" class="buttonnotchoice" onclick="location.href='myPage_new_1.php'"></td>
            </td>
    </table>
    </center>
 

    <center>
    <BR>
        <!-- 게시판 타이틀 -->
        <!--<font size=2><?=$user_id?> 님의 예약요청 현황</a>-->
    <BR>
    <BR>
        <!-- 게시물 리스트를 보이기 위한 테이블 -->
        <?php if($count == 0) :?>
            <table><font color ="e1716f">현재 진행중 예약 내역이 없습니다</font></table>
        <?php else :?>
             <?php while ($row = mysqli_fetch_array($result)){ ?>
             <?php if(mktime(0,0,0,$row['reserveDay'],$row['reserveMonth'],2016) >= time()):?>
             
                    <table border="3" rules=none bordercolor="#e1716f" height=150 width=300 bgcolor="#ffffff">
                        <tr>
                            
                            <!-- 샵 이름 시작-->
            	            <td align=center height=20>
                	    	    <font size="5" color=black><?=$row['shopName']?></font>
                	        </td>
                	        <!-- 삽이름 끝 -->
                	        <!-- 예약대기?-->
                	        <td align=center height=20>
                	            <?php if($row['reservecondition'] == 1) :?>
                	    	        <font color=black>예약완료</font>
                	    	    <?php else :?>
                	    	        <font color=#e1716f>예약대기중</font>
                	    	    <?php endif ?>
                	        </td>
                	        <!-- 예약대기끝-->
                        </tr>
                        <tr>
                            
                            <!-- 예약일시 -->
                            <td align=center height=20 >
                                <font color = black>예약일시</font> 
                            </td>
            	            <td align=center height=20>
                	        	<font color=black><?=$row['reserveMonth']."월 ".$row['reserveDay']."일 ".$row['reserveTime']?></font>
            	            </td>
            	            <!-- 예약일시 끝 -->
                        </tr>
                        <tr>
                            
                            <!-- 예약시간 -->
                            <td align=center height=20 >
                                <font color = black>예약시간</font>
                            </td>
            	            <td align=center height=20>
                	        	<font color=black><?=$row['reserveTime']?></font>
            	            </td>
            	            <!-- 예약시간 끝 -->
                        </tr>
                        <tr>
                            
            	            <!-- 종류 -->
            	            <td align=center height=20 >
                                <font color = black>예약종류</font>
                            </td>
            	            <td align=center height=20>
                	        	<font color=black><?=$row['type']?></td>
            	            <!-- 종류 끝 -->
                        </tr>
                        <tr>
                            <td align=center>
                                <input type="button" value="샵 상세보기" class="buttondetail" onclick="location.href='info.php?keyValue=<?=$row['keyValue']?>' ">
                            </td>
                            <td align=center>
                                <input type="button" value="예약취소하기" class="buttoncancel" onclick="alert('준비중 입니다!');">
                            </td>
                        </tr>
                    </table>
                </table>
                <br>
                <br>
            <?php else :?>
            
            <?php endif?>
        <?php } ?>
        <?php endif?>
        
    </center>
    
<script>roundTable("ta");</script>
<script>roundTable("tab");</script>
<script>roundTable("tab1");</script>

</body>
</html>