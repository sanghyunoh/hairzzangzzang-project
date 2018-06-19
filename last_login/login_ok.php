<meta charset="UTF-8">

<?php
session_start();

include "db_info.php";

$username = $_POST['username'];
$password = $_POST['password'];


if(!$username or !$password){
    echo "<script>alert(\"ID와 PW를 입력해주세요.\");</script>";
	echo "<script>history.back();</script>";
	exit;
}

$q = "select * from userInformation where userId='$username'";
$result = mysqli_query($conn, $q);

	while($row = mysqli_fetch_assoc($result)){
    	if($row['password'] == $password){
        	$_SESSION['userId'] = $username;

    		echo "<meta http-equiv='refresh' content='0; url=list.php'>";
			exit;
    	}
    	else {
    		echo "<meta http-equiv='refresh' content='0; url=login.html'>";
        	echo "<script>alert(\"ID/PW가 틀렸습니다.\");</script>";
        	exit;
    	}
	}
?>