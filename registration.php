
<html5>
<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
    <link rel="stylesheet" type="text/css" href="/css/registeration.css">
    <link rel="stylesheet" type="text/css" href="/css/font.css">
    
</head>
<body>
<!--placeholder : 입력칸 뒷배경에 나오는 글자
    pattern : 정규식(입력칸 글자타입 제한)
    required : 필수입력 
    
    모든입력칸 필수입력으로 만듬.
-->

<form action=do_register.php method=post>

        <div class="topBar">
            <div>개인 정보 입력</div>
        </div>
            <div class="selectName" id="idName">ID</div>
            
            <!-- id  -->
            <div><input type="text" class="select" id="id" name="userId"
            placeholder ="이메일형식으로 입력해주세요." 
            pattern = "^[0-9a-zA-Z_\-]+@[0-9a-zA-Z_\-]+(\.[0-9a-zA-Z_\-]+){1,2}$"
            required/></div>
            
            <!-- 비밀번호 정규식 
            조건1. 6~20 영문 대소문자
            조건2. 최소 1개의 숫자 혹은 특수 문자를 포함해야 함 
            pattern = "^(?=.*[0-9a-zA-Z])((?=.*\d)|(?=.*\W)).{6,20}$"
            title = "6~20 영문 대소문자와 최소 1개의 숫자 혹은 특수문자를 포함시켜주세요."
            -->
            
            <div class="selectName" id="passwordName">비밀번호</div>
            <div><input type="password" class="select" id="password" name="password" 
            placeholder ="비밀번호를 입력해주세요."
            required></div> 
            
            <!-- 이름  
            <div class="selectName" id="userName">이름</div>
            <div><input type="text" class="select" id="name" name="name" 
            placeholder = "이름을 입력해주세요."
            required></div>
        
        
       
            성별  
            <div class="selectName" id="sexName">성별</div>
            <div><select class="select" id="sex" name="sex">
                    <option value="man">남자</option>
                    <option value="woman">여자</option>
                </select>
            </div>

             나이            
            <div class="selectName" id="ageName">나이</div>
            <div><input type="age"class="select" id="age" name="age" 
            placeholder ="나이를 입력해주세요."
            required></div>

           전화번호  -->         
            <div class="selectName" id="phoneName">전화번호</div>
            <div><input type="text" class="select" id="telephoneNumber" name="telephoneNumber" 
            placeholder ="전화번호를 입력해주세요."
            pattern = "^\d{2,3}\-\d{3,4}\-\d{4}$"
            required></div>
    
    <button type="submit" id="registerButton">가입하기</button>
</body>
</html5>