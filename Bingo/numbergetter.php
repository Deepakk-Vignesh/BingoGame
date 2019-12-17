<?php
    include('dbcon.php');
    $name=$_GET["name"];
    $query="SELECT lastval FROM bingotable WHERE game='$name'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    echo $row["lastval"];
?>