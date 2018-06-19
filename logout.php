<?php
include 'config.php';

if(isset($_SESSION['userId']))
{
unset($_SESSION['userId']);

if(isset($_COOKIE[$cookie_name]))
{
// remove 'site_auth' cookie
setcookie ($cookie_name, '', time() - $cookie_time);
}

header("Location: login.php");
exit;
}
?>