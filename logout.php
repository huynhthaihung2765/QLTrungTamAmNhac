<?php
session_start();

echo "Thời gian đợi.";
echo date('h:i:s') . "<br>";

//sleep for 5 seconds
sleep(2);

//start again
echo date('h:i:s');
session_destroy();
header("Location: login.php");
 ?>
