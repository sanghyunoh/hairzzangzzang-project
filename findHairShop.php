<!DOCTYPE html>
<?php
//데이터 베이스 연결하기
include "session.php";
include "db_info.php";
$shopname = $_POST['shopname'];
$query = "SELECT * FROM hairShop WHERE shopName like '%{$shopname}%'";
$result = mysqli_query($conn, $query);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>헤어짱짱</title>
    <style>
    </style>
</head>
<body>
    <center>
    <BR>
    <!-- 게시판 타이틀 -->
    <font size=2>검색결과
    <BR><BR>
    <!-- 게시물 리스트를 보이기 위한 테이블 -->
    <table>
        <?php
         while ($row = mysqli_fetch_assoc($result))
        {
        ?>
        <tr>
            <td style=" background:url(<?=$row['picture']?>img1.jpg);background-repeat:no-repeat; background-size:250px 250px;" width="250px" height="250px" valign="bottom">
                <span style="color:#fd6a1c; font-weight:500; font-size:25px; font-family:맑은 고딕; letter-spacing:-3px; line-height:1.6; background-color: rgba(255, 255, 255, 0.6); padding:0px 15px 5px 10px"><a href="info.php?keyValue=<?=$row['keyValue']?>">
        		<?=strip_tags($row['shopName'], '<b><i>')?></a></font>
                </span>
            </td> 
        </tr> 
        <?php
        } // end While
        ?>
    </table>

    
    <BR><BR><BR>

    </center>
</body>
</html>