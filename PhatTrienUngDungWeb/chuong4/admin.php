<?php
session_start();
error_reporting();
if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {

    include("myclass/clslogin.php");

    $p = new login();

    $p->confirmlogin($_SESSION['user'], $_SESSION['pass']);

} else {

    header('Location: login.php');
    exit();

}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>