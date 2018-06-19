<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>제휴문의</title>
    <link rel="stylesheet" type="text/css" href="/css/requestHairShop.css">
    <link rel="stylesheet" type="text/css" href="/css/font.css">

</head>
<body>
<form action=request.php method=post>
    <div class="topBar">제휴문의</div>
    <center>
    <div>
        
        <div>
            <div class="selectName" id="coperName">업체명</div>
            <div><input class="select" id="id" type="text" name="coper"></div>
        </div>
        <div>
            <div class="selectName" id="userPosition">직책</div>
            <div><input class="select" id="position" type="text" name="position"></div>
        </div>
        <div>
            <div class="selectName" id="userName">성함</div>
            <div><input class="select" id="name" type="text" name="name"></div>
        </div>
         <div>
            <div class="selectName" id="userPhone">연락처</div>
            <div><input class="select" id="telephoneNumber" type="text" name="telephoneNumber"></div>
        </div>
        <div>
            <div class="selectName" id="userEmail">이메일</div>
            <div><input class="select" id="email" type="text" name="email"></div>
        </div>
         <div>
            <div class="selectName" id="userURL">연락가능시간</div>
            <div><input class="select" id="url" type="text" name="url"></div>
        </div>
        <div>
            <div class="selectName" id="userQuestion">기타사항</div>
            <div><textarea id="textArea" name ="question" class="select"></textarea></div>
        </div>
    </div>
    <button id="registerButton">요청하기</button>
    </center>
</body>
</html>