<?php
session_start();
session_unset();
session_destroy();
header('Location: auth_check.php');
exit;
?>
