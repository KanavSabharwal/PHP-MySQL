<?php
session_start();
echo "<div style='font-size:30px; text-align:center;height:40px; background-color:#fff; color:#ff747f; padding:0px;  font-family:gotham; '>Logging you out<br><img src='eclipse.gif'>";
session_destroy();
    header("refresh:3;url=index.php");
     die();
?>