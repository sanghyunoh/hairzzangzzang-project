<?php
//데이터 베이스 연결하기
include "db_info.php";

$query = "SELECT * 
FROM ReserveCondition
INNER JOIN userInformation ON ReserveCondition.user_id = userInformation.userId
ORDER BY nowDate DESC
LIMIT 0,50";
    $result = mysqli_query($conn, $query);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
    <title>예약요청 현황</title>
</head>
<style>
    th, td {
    border-bottom: 1px solid #ddd;
    }
    </style>
<center>
<body>
    <center>
    <BR>
    <!-- 게시판 타이틀 -->
    <font size=2>예약요청 현황</a>
    <BR>
    <BR>
    <!-- 게시물 리스트를 보이기 위한 테이블 -->
    <table>
        <!-- 리스트 타이틀 부분 -->
        <tr height=20 bgcolor=#999999>
        	<td width=50 align=center>
        		<font color=white>번호</font>
        	</td>
        	<td width=50 align=center>
        		<font color=white>종류</font>
        	</td>
        	<td width=370 align=center>
        		<font color=white>추가요청사항</font>
        	</td>
        	<td width=150 align=center>
        		<font color=white>예약 시간</font>
        	</td>
        	<td width=150 align=center>
        		<font color=white>신청 시간</font>
        	</td>
        	<td width=150 align=center>
        		<font color=white>예약자 이름</font>
        	</td>
        	<td width=150 align=center>
        		<font color=white>성별</font>
        	</td>
        	<td width=150 align=center>
        		<font color=white>전화번호</font>
        	</td>
        	<td width=150 align=center>
        		<font color=white>이메일</font>
        	</td>
        </tr>
        <!-- 리스트 타이틀 끝 -->
        <!-- 리스트 부분 시작 -->
        <?php
        while($row = mysqli_fetch_assoc($result))
        {
            
        ?>
        <!-- 행 시작 -->
        <tr>
        	<!-- 번호 -->
        	<td height=20 bgcolor=white align=center>
        		<?=$row['id']?>
        	</td>
        	<!-- 번호 끝 -->
        	<!-- 종류 -->
        	<td height=20 bgcolor=white>
        	    <?=$row['type']?>
        	</td>
        	<!-- 종류 끝 -->
        	<!-- 요구 -->
        	<td align=center height=20 bgcolor=white>
        		<font color=black>
        		<?=$row['request']?>
        		</font>
        	</td>
        	<!-- 요구 끝 -->
        	<!-- 예약시간 -->
        	<td align=center height=20 bgcolor=white>
        		<font color=black><?=$row['reserveMonth']."월 ".$row['reserveDay']."일 ".$row['reserveTime']?></font>
        	</td>
        	<!-- 예약시간 끝 -->
        	<!-- 신청시간 -->
        	<td align=center height=20 bgcolor=white>
        		<font color=black><?=$row['nowDate']?></font>
        	</td>
        	<!-- 신청시간 끝 -->
        	<!-- 이름 -->
        	<td align=center height=20 bgcolor=white>
        		<font color=black><?=$row['name']?></font>
        	</td>
        	<!-- 이름 끝 -->
        	<!-- 성별 -->
        	<td align=center height=20 bgcolor=white>
        		<font color=black><?=$row['sex']?></font>
        	</td>
        	<!-- 성별 끝 -->
        	<!-- 전화별번호 -->
        	<td align=center height=20 bgcolor=white>
        		<font color=black><?=$row['telephoneNumber']?></font>
        	</td>
        	<!-- 전화번호 끝 -->
        	<!-- 이메일 -->
        	<td align=center height=20 bgcolor=white>
        		<font color=black><?=$row['email']?></font>
        	</td>
        	<!-- 이메일 끝 -->
        </tr>
        <!-- 행 끝 -->
        <?php
        } // end While
        ?>
        
    </table>
    </center>
</body>
</html>