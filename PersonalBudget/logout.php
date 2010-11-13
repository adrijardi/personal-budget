<?php

setcookie($userCookie, "", time() - 3600);
session_destroy();
header("HTTP/1.1 200 Ok");
header("Location: index.php");
?>
