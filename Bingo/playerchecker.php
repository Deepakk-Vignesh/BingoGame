<?php
    include('dbcon.php');
    $name=$_GET["name"];
    $query="SELECT player2 FROM bingotable WHERE game='$name'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if($row["player2"]==1){
        echo "1";
    }
?>