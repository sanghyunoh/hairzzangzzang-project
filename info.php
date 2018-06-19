<!DOCTYPE html>
<?php
//데이터 베이스 연결하기
include "db_info.php";
    $keyValue = $_GET[keyValue];
    $query = "SELECT * FROM hairShop WHERE keyValue = '$keyValue'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
?>
<html>
<head>
    <title><?=$row['shopName']?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/infocss.css">
    <link rel="stylesheet" type="text/css" href="/css/font.css">
    <script type="text/javascript" src="js/jssor.slider.min.js"></script>
    
</head>

    <?php
          // 디렉토리에 있는 파일과 디렉토리의 갯수 구하기
          $result=opendir("img/shop/key{$keyValue}"); //opendir함수를 이용해서 bbs디렉토리의 핸들을 얻어옴
          // readdir함수를 이용해서 bbs디렉토리에 있는 디렉토리와 파일들의 이름을 배열로 읽어들임 
          while($file=readdir($result)) {
             
             if($file=="."||$file=="..") {continue;} // file명이 ".", ".." 이면 무시함
             $fileInfo = pathinfo($file);
             $fileExt = $fileInfo['extension']; // 파일의 확장자를 구함
        
             If (empty($fileExt)){
                $dir_count++; // 파일에 확장자가 없으면 디렉토리로 판단하여 dir_count를 증가시킴
             } else {
                $file_count++;// 파일에 확장자가 있으면 file_count를 증가시킴
             }
           }
           
           // 디렉토리에 있는 파일과 디렉토리의 갯수 구하기
          $resultPort=opendir("img/shop/key{$keyValue}/portfolio"); //opendir함수를 이용해서 bbs디렉토리의 핸들을 얻어옴
              // readdir함수를 이용해서 bbs디렉토리에 있는 디렉토리와 파일들의 이름을 배열로 읽어들임 
        while($file=readdir($resultPort)) {
            if($file=="."||$file=="..") {continue;} // file명이 ".", ".." 이면 무시함
                $fileInfo = pathinfo($file);
                $fileExt = $fileInfo['extension']; // 파일의 확장자를 구함
        
             If (empty($fileExt)){
                $dirPort_count++; // 파일에 확장자가 없으면 디렉토리로 판단하여 dir_count를 증가시킴
                 } else {
                    $filePort_count++;// 파일에 확장자가 있으면 file_count를 증가시킴
                 }
               }
            ?>
<body>
    
    <?php
    //상단 바 추가
        /*include "topBar.html";*/
	    include "topBar.php";
    ?>
    
    <div id="wrapper">
    <!-- 이미지 슬라이드 -->
        <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 100vw; height: 55vw; overflow: hidden; visibility: hidden;">
            <!-- Loading Screen -->
            <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                
                <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
            </div>
            <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 100vw; height: 55vw; overflow: hidden;">
                <?php
                    $i;
                    for($i=1; $i<=$file_count; $i++){
                ?>
                <div data-p="112.50" style="display: none;">
                    <img data-u="image" src="<?=$row['picture']?>img<?=$i?>.jpg" />
                </div>
                <?php
                    }
                ?>
            </div>
            <!--
            <h1 style="position: absolute; bottom: 50px; left:10px; width:80%;"><span style="color:white; letter-spacing: -1px; padding:10px;"><?=strip_tags($row['shopName'], '<b><i>')?></span></h1>
            <h3 style="position: absolute; bottom: 10px; left:10px; width:40%;"><span style="color:white; letter-spacing: -1px; padding:10px;"><?=strip_tags($row['shopName'], '<b><i>')?></span></h3>
            -->
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb01" style="bottom:16px;right:45%">
                <div data-u="prototype" style="width:12px;height:12px;"></div>
            </div>
            <!-- Arrow Navigator -->
            <span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
            <span data-u="arrowright" class="jssora02r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
        </div>
    <script>
        jssor_1_slider_init();
    </script>
    <!-- 이미지 슬라이드 끝 -->

<script>
$(document).ready(function(){
    $("#infoIcon").click(function(){
        $("#infoIcon").attr("src","/img/icon/information.png");
        $("#menuIcon").attr("src","/img/icon/menu_un.png");
        $("#photoIcon").attr("src","/img/icon/photo_un.png");
        $("#reviewIcon").attr("src","/img/icon/review_un.png");
        $('#info').removeClass();
        $('#menu').removeClass().addClass('cantsee');
        $('#portfolio').removeClass().addClass('cantsee');
        $('#review').removeClass().addClass('cantsee');
    });
    $("#menuIcon").click(function(){
        $("#infoIcon").attr("src","/img/icon/information_un.png");
        $("#menuIcon").attr("src","/img/icon/menu.png");
        $("#photoIcon").attr("src","/img/icon/photo_un.png");
        $("#reviewIcon").attr("src","/img/icon/review_un.png");
        $('#info').removeClass().addClass('cantsee');
        $('#menu').removeClass();
        $('#portfolio').removeClass().addClass('cantsee');
        $('#review').removeClass().addClass('cantsee');
        
    });
    $("#photoIcon").click(function(){
        $("#infoIcon").attr("src","/img/icon/information_un.png");
        $("#menuIcon").attr("src","/img/icon/menu_un.png");
        $("#photoIcon").attr("src","/img/icon/photo.png");
        $("#reviewIcon").attr("src","/img/icon/review_un.png");
        $('#info').removeClass().addClass('cantsee');
        $('#menu').removeClass().addClass('cantsee');
        $('#portfolio').removeClass();
        $('#review').removeClass().addClass('cantsee');
    });
    $("#reviewIcon").click(function(){
        $("#infoIcon").attr("src","/img/icon/information_un.png");
        $("#menuIcon").attr("src","/img/icon/menu_un.png");
        $("#photoIcon").attr("src","/img/icon/photo_un.png");
        $("#reviewIcon").attr("src","/img/icon/review.png");
        $('#info').removeClass().addClass('cantsee');
        $('#menu').removeClass().addClass('cantsee');
        $('#portfolio').removeClass().addClass('cantsee');
        $('#review').removeClass();
    });
});
</script>

    <div class="selectSectionImg">
        <img id="infoIcon" src="/img/icon/information.png"/>
        <img id="menuIcon" src="/img/icon/menu_un.png"/>
        <img id="photoIcon" src="/img/icon/photo_un.png"/>
        <img id="reviewIcon" src="/img/icon/review_un.png"/>
    </div>
    
    <!--미용실정보 -->
    <table class="see" id="info">
        <tr>
            <td>전화번호</td>
            <td><?=$row['telephone']?></td>
        </tr>
        <tr>
            <td>영업시간</td>
            <td><?=$row['openTime']?></td>
        </tr>
        <tr>
            <td>주소</td>
            <td><?php echo $row['detailAddress'];?></td>
        </tr>
        <tr><td style="padding-top:30px !important; " colspan="2"><?php include("mapdatatest/$keyValue.php")?></td></tr>
     </table>
    <!--미용실정보 끝 -->

    <!--매뉴 -->
    <table class="cantsee" id="menu">
        <!-- 하나의 카테고리 시작-->
        <tr><td colspan="2" style="padding-top:15px !important;color:#e1716f;">기본 매니큐어</td></tr>
        <?php
            $shopname = $row['shopName'];
            $query = "SELECT * FROM priceDB WHERE shopName = '$shopname' AND category = '기본 매니큐어'";
            $result = mysqli_query($conn, $query);
         while ($row2 = mysqli_fetch_assoc($result))
        {
        ?>
        <tr>
        	<td><?=$row2['name']?></td>
        	<td style="text-align:right; color:#767677"><?=$row2['price']?></td>
        </tr>
        <?php
        }
        ?>
        <tr><td colspan="2" style="border-top:1px solid #ddd;"></td></tr>
        <!-- 하나의 카테고리 끝-->
        <tr><td colspan="2" style="padding-top:15px !important;color:#e1716f;">젤 매니큐어</td></tr>
        <?php
            $shopname = $row['shopName'];
            $query = "SELECT * FROM priceDB WHERE shopName = '$shopname' AND category = '젤 매니큐어'";
            $result = mysqli_query($conn, $query);
         while ($row2 = mysqli_fetch_assoc($result))
        {
        ?>
        <tr>
        	<td><?=$row2['name']?></td>
        	<td style="text-align:right;"><?=$row2['price']?></td>
        </tr>
        <?php
        }
        ?>
        <tr><td colspan="2" style="border-top:1px solid #ddd;"></td></tr>
         <!-- 하나의 카테고리 시작-->
        <tr><td colspan="2" style="padding-top:15px !important;color:#e1716f;">기본 패디큐어</td></tr>
        <?php
            $shopname = $row['shopName'];
            $query = "SELECT * FROM priceDB WHERE shopName = '$shopname' AND category = '기본 패디큐어'";
            $result = mysqli_query($conn, $query);
         while ($row2 = mysqli_fetch_assoc($result))
        {
        ?>
        <tr>
        	<td><?=$row2['name']?></td>
        	<td style="text-align:right; color:#767677"><?=$row2['price']?></td>
        </tr>
        <?php
        }
        ?>
        <tr><td colspan="2" style="border-top:1px solid #ddd;"></td></tr>
        <!-- 하나의 카테고리 끝-->
         <!-- 하나의 카테고리 시작-->
        <tr><td colspan="2" style="padding-top:15px !important;color:#e1716f;">젤 패디큐어</td></tr>
        <?php
            $shopname = $row['shopName'];
            $query = "SELECT * FROM priceDB WHERE shopName = '$shopname' AND category = '젤 패디큐어'";
            $result = mysqli_query($conn, $query);
         while ($row2 = mysqli_fetch_assoc($result))
        {
        ?>
        <tr>
        	<td><?=$row2['name']?></td>
        	<td style="text-align:right; color:#767677"><?=$row2['price']?></td>
        </tr>
        <?php
        }
        ?>
        <tr><td colspan="2" style="border-top:1px solid #ddd;"></td></tr>
        <!-- 하나의 카테고리 끝-->
    </table>
    
    
<!--매뉴 끝 -->
<script>
function openNewWindow(url) {
    var specs = "width=100";
    //specs += ",toolbar=no,menubar=no,status=no,scrollbars=no,resizable=no";
    window.open(url, "_self", specs);
}

</script>

<!--미용실 포트폴리오 -->
    <table class="cantsee" id="portfolio" style="border:none;">
        <?php
            for($i=1; $i<=$filePort_count; $i++){
                if(fmod($i,3) == 1){
                    echo "<tr>";
                }
        ?>
            <td>
                <a href="/viewImage.php?keyValue=<?=$row['keyValue']?>&i=<?=$i?>">
                <img id="portfolioPhoto" src="<?=$row['picture']?>portfolio/portfolio<?=$i?>.jpg" />
                </a>
            </td>
        <?php
                if(fmod($i,3) == 0){
                    echo "</tr>";
                }
            }
        ?>
    </table>

<script>
$(document).ready(function(){
    $("#portfolioPhoto").click(function() {
        var winWidth = $(window).width();
        //var winHeight = theImage.height + 20;
        	
        
    
    });
});
$(document).ready(function(){
    $("#star1").click(function(){
        $("#star1").attr("src","/img/icon/starOn.png");
        $("#star2").attr("src","/img/icon/starOff.png");
        $("#star3").attr("src","/img/icon/starOff.png");
        $("#star4").attr("src","/img/icon/starOff.png");
        $("#star5").attr("src","/img/icon/starOff.png");
        $("#starPoint").attr("value","1");
    });
    $("#star2").click(function(){
        $("#star1").attr("src","/img/icon/starOn.png");
        $("#star2").attr("src","/img/icon/starOn.png");
        $("#star3").attr("src","/img/icon/starOff.png");
        $("#star4").attr("src","/img/icon/starOff.png");
        $("#star5").attr("src","/img/icon/starOff.png");
        $("#starPoint").attr("value","2");
    });
    $("#star3").click(function(){
        $("#star1").attr("src","/img/icon/starOn.png");
        $("#star2").attr("src","/img/icon/starOn.png");
        $("#star3").attr("src","/img/icon/starOn.png");
        $("#star4").attr("src","/img/icon/starOff.png");
        $("#star5").attr("src","/img/icon/starOff.png");
        $("#starPoint").attr("value","3");
    });
    $("#star4").click(function(){
        $("#star1").attr("src","/img/icon/starOn.png");
        $("#star2").attr("src","/img/icon/starOn.png");
        $("#star3").attr("src","/img/icon/starOn.png");
        $("#star4").attr("src","/img/icon/starOn.png");
        $("#star5").attr("src","/img/icon/starOff.png");
        $("#starPoint").attr("value","4");
    });
    $("#star5").click(function(){
        $("#star1").attr("src","/img/icon/starOn.png");
        $("#star2").attr("src","/img/icon/starOn.png");
        $("#star3").attr("src","/img/icon/starOn.png");
        $("#star4").attr("src","/img/icon/starOn.png");
        $("#star5").attr("src","/img/icon/starOn.png");
        $("#starPoint").attr("value","5");
    });
    
});
    
</script>
    <!--미용실 리뷰 -->
    <div class="cantsee" id="review">
        <?php
        //데이터 베이스 연결하기
        $query2 = "SELECT * FROM review WHERE {$keyValue} = shopKey
        ORDER BY nowDate DESC" ;
        $result2 = mysqli_query($conn, $query2);
        ?>
        <table style="width:95%;">
            <tr>
                <td style="float:left;padding-left:2%;margin-top:20px;"><?=$_SESSION['userId']?> 님</td>
                <td style="float:right;padding-right:2%;margin-top:20px;">
                    <img class='star' id="star1" src='/img/icon/starOff.png' />
                    <img class='star' id="star2" src='/img/icon/starOff.png' />
                    <img class='star' id="star3" src='/img/icon/starOff.png' />
                    <img class='star' id="star4" src='/img/icon/starOff.png' />
                    <img class='star' id="star5" src='/img/icon/starOff.png' />
                </td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid #ddd;">
                    <form action=doreview.php?keyValue=<?=$_GET['keyValue']?> method=post>
                    <input type="text" maxlength="80" name="content" id="content" style="margin-bottom:20px;width:80%;float:left;" />
                    <input type="hidden" name="star" value="0" id="starPoint"/>
                    <button>등록</button>
                    </form>
                </td>
            </tr>
            <?php
            while($row2 = mysqli_fetch_assoc($result2))
            {
            ?>
            <tr>
                <td style="float:left;padding-left:2%;"><?=$row2['userId']?> 님</td>
                <td style="float:right;padding-right:2%;">
                    
                    <?php
                        for($i=0; $i<$row2['score']; $i++){
                            echo "<img class='star' src='/img/icon/starOn.png' />";
                        }
                        for($i=0; $i<(5-$row2['score']); $i++){
                            echo "<img class='star' src='/img/icon/starOff.png' />";
                        }
                    ?>
                    
                </td>
            </tr>
            
            <tr>
                <td style="word-break:break-all;width:99%;float:left;padding:6% 2% 6% 2%;text-align:justify;border-bottom: 1px solid #ddd;"><?=$row2['content']?></td>
            </tr>
            
            <?php
            } // end While
            ?>
        </table>

    </div>
    <a href="/reserve.php?keyValue=<?=$keyValue?>" class="reserveButton" target="_blank">예약하기</a>
</body>
</html>