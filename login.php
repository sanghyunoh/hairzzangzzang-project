<?php
require_once 'config.php';

// Is the user already logged in? Redirect him/her to the private page

if($_SESSION['userId'])
{
header("Location: list.php");
exit;
}

if(isset($_POST['submit']))
{
$do_login = true;
include_once 'do_login.php';
}



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
 <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/font.css">
  <link rel="stylesheet" type="text/css" href="/css/login.css">
  <title>로그인</title>
 </head>
<body>

<div align="left" style="width: 330px;">
<form name="login" method="post" action="login.php">


<label class="selectName" id="idName">Id</label><input class="select" id="username" type="text" name="username" placeholder="id를 입력해주세요">
<label class="selectName" id="passwordName">Password</label><input class="select" id="password" type="password" name="password" placeholder="pw를 입력해주세요.">
<input id="autologin" type="checkbox" name="autologin" value="1" style="display:none" >
<input id="submit" type="submit" name="submit" value="Login">

</form>
    
<!--<input id="registerbutton" type="button" href="/registration.php" value = "회원가입하기">-->
</div>

</body>
