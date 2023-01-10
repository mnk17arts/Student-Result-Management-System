<?php

session_start();
echo "Logging you out. Please Wait...";


session_destroy();
header("Location: /task-3/home.php");
?>