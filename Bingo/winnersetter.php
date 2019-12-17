<?php
    include('dbcon.php');
    $name=$_GET["name"];
    session_start();
    $num=isset($_SESSION["player1"])?1:2;
    $query="UPDATE bingotable SET winner=$num WHERE game='$name'";
    $result = mysqli_query($conn, $query);
?>