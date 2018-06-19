<meta charset="UTF-8">
<?php
session_start();
include "db_info.php";


// declare post fields

$post_username = trim($_POST['username']);
$post_password = trim($_POST['password']);
$post_autologin = $_POST['autologin'];

if(!$post_username or !$post_password){
    echo "<script>alert(\"ID와 PW를 입력해주세요.\");</script>";
	echo "<script>history.back();</script>";
	exit;
}

//if(!$do_login) exit;

$q = "select * from userInformation where userId='$post_username'";
$result = mysql_query($conn, $q);

	while($row = mysql_fetch_assoc($result)){
    	if($row['password'] == $post_password){
        	$_SESSION['userId'] = $post_username;
			$login_ok = true;
			
    		echo "<meta http-equiv='refresh' content='0'; url='list.php'>";
			if($post_autologin == 1)
				{
				$config_username = $post_username;
				$config_password = $post_password;
				$password_hash = md5($config_password); // will result in a 32 characters hash
				setcookie ($cookie_name, 'usr='.$config_username.'&hash='.$password_hash, time() + $cookie_time);
				}
			exit;
    	}
    	else {
    	echo "<script>alert(\"The submitted login info is incorrect.\");</script>";
    	$login_error = true;
    	echo "<meta http-equiv='refresh' content='0'; url='login.php'>";
        exit;
    	}
	}
	if($login_ok) exit;

?>

