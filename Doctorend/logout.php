<?php
session_start();
session_unset();
session_destroy();
setcookie('doc_id', '', time() - 3600); // expire cookie
header('location:doclogin.php');
exit();
?>
