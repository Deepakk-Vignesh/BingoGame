<?php
    include('dbcon.php');
    $name=$_GET["name"];
    $num=$_GET["num"];
    $query="UPDATE bingotable SET lastval=$num WHERE game='$name'";
    $result = mysqli_query($conn, $query);
?>