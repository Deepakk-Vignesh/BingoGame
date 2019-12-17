<?php
    include('dbcon.php');
    $name=$_GET["name"];
    $query="SELECT player1 FROM bingotable WHERE game='$name'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    session_start();
    if($row["player1"]==0){
        $_SESSION["player1"]=true;
        $query="UPDATE bingotable SET player1=1 WHERE game='$name'";
        $result = mysqli_query($conn, $query);
        echo "1";
    }
    else if(!isset($_SESSION["player1"])){
        $query="SELECT player2 FROM bingotable WHERE game='$name'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if($row["player2"]==0){
            $_SESSION["player2"]=true;
            $query="UPDATE bingotable SET player2=1 WHERE game='$name'";
            $result = mysqli_query($conn, $query);
        }
    }
    else{
        
    }
?>