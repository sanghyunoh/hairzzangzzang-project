<?php
session_start();
if(!isset($_SESSION['userId'])){
    echo ("<meta http-equiv='Refresh' content='0; URL=login.php'>");
	exit;
}
?>