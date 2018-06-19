<!DOCTYPE html>
<?php
//데이터 베이스 연결하기
include "session.php";
include "db_info.php";


$keyValue = $_GET[keyValue];
 $query = "SELECT * FROM hairShop WHERE keyValue = '$keyValue'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    $user_id = $_SESSION[userId];
    $query = "SELECT * FROM userInformation WHERE userId = '$user_id'";
    $result = mysqli_query($conn, $query);
    $row2 = mysqli_fetch_assoc($result);
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?=$row['shopName']?> 예약하기</title>
        
    <link rel="stylesheet" type="text/css" href="/css/font.css">
    <link rel="stylesheet" type="text/css" href="/css/reserve.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      showButtonPanel: true
    });
  });
  </script>
        
</head>
<body>
    
<form action=doreserve.php?keyValue=<?=$row['keyValue']?> method=post>
    
    <!-- userData -->
    <div class="hiddenData">
        <input type="hidden" name="userName" value="<?=$row2['name']?>">
        <input type="hidden" name="sex" value="<?=$row2['sex']?>">
        <input type="hidden" name="phoneNumber" value="<?=$row2['telephoneNumber']?>">
        <input type="hidden" name="email" value="<?=$row2['email']?>">
    </div>
    
    <!-- topBar 뒤로가기 기능은 그냥 현재 윈도우 창 종료 -->
    <div class="topBar">
        <td>예약페이지</td>
    </div>
    
    
    
        <!--날짜-->
        <div class="selectName" id="dateName">날짜</div>
            
        <input type="text" id="datepicker" name="datepicker" class="select" style="height:20px;">
        
    
    
        <!--카테고리-->
        <div class="selectName" id="optionName">카테고리</div>
        
        <select id="type" name="type" value ="선택하세요" class="select" >
        <option value="카테고리1">카테고리1</option>
        <option value="카테고리2">카테고리2</option>
        <option value="카테고리3">카테고리3</option>
        <option value="카테고리4">카테고리4</option>
        </select>
    
        <!--세부메뉴-->
        <div class="selectName" id="optionName2">세부메뉴</div>
        
        <select id="type2" name="type2" value ="선택하세요" class="select" >
        <option value="메뉴1">메뉴1</option>
        <option value="메뉴2">메뉴2</option>
        <option value="메뉴3">메뉴3</option>
        </select>
        
        <!--시간-->
        <div class="selectName" id="timeName">시간</div>
        
        <select id="time" name="time" class="select" ><option>항목부터 선택해주세요</option></select>
            <script>
                    $(document).ready(function() {
                            var type = document.getElementById("type").value;
                            var ht2 ="";
                                  ht2 +="<option value=11:00>11:00</option>"+
                                        "<option value=11:30>11:30</option>"+
                                        "<option value=12:00>12:00</option>"+
                                        "<option value=12:30>12:30</option>"+
                                        "<option value=13:00>13:00</option>"+
                                        "<option value=13:30>13:30</option>"+
                                        "<option value=14:00>14:00</option>"+
                                        "<option value=14:30>14:30</option>"+
                                        "<option value=15:00>15:00</option>"+
                                        "<option value=15:30>15:30</option>"+
                                        "<option value=16:00>16:00</option>"+
                                        "<option value=16:30>16:30</option>"+
                                        "<option value=17:00>17:00</option>"+
                                        "<option value=17:30>17:30</option>"+
                                        "<option value=18:00>18:00</option>"+
                                        "<option value=18:00>18:30</option>"+
                                        "<option value=19:00>19:00</option>"+
                                        "<option value=19:30>19:30</option>"+
                                        "<option value=20:00>20:00</option>"+
                                        "<option value=20:30>20:30</option>"+
                                        "<option value=21:00>21:00</option>"+
                                        "<option value=21:30>21:30</option>"+
                                        "<option value=22:00>22:00</option>";
                                document.getElementById("time").innerHTML = ht2;
                    });
            </script>    
        
        <!--요청사항-->
        <div class="selectName" id="requestName" >요청사항</div>
        
        
        <textarea id="textArea" name ="request" class="select">없습니다.</textarea>
        

        <!--버튼-->
        <button id="reserveButton">예약하기</button>
    
</body>
</html>