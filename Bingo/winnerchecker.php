<?php
    include('dbcon.php');
    $name=$_GET["name"];
    $query="SELECT winner FROM bingotable WHERE game='$name'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    session_start();
    if(($row["winner"]==1&&isset($_SESSION["player1"]))||($row["winner"]==2&&isset($_SESSION["player2"]))){
        echo "1";
    }
    else if(($row["winner"]==2&&isset($_SESSION["player1"]))||($row["winner"]==1&&isset($_SESSION["player2"]))){
        echo "2";
    }
?>