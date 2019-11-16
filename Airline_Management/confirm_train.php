<?php
session_start();
?>
<html>
    <head>
    </head>
    <body style="background-color:#B34242; margin:0px;">
<?php
if(isset($_SESSION['lsucc'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "travlr";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{

        }
    
        $query="select * from train where train_number='".$_SESSION['train_number']."'";
        $result=mysqli_query($conn,$query);
        $row = $result->fetch_assoc();
        if($row['seats_available']==0){
            echo "Sorry no seats left!";
            header("refresh:2;url=index.php");
            die();
        }
    
        $count='SELECT COUNT(*) FROM book;';
        $result=mysqli_query($conn,$count);
        while ($row = $result->fetch_assoc()) {$ct= $row['COUNT(*)'];}
        $ct++;
    $query="update  train set seats_available=seats_available-1 where train_number='".$_SESSION['train_number']."'";
     $result=mysqli_query($conn,$query);
        $query="insert into book values('".$_SESSION['email']."','0','".$_SESSION['train_number']."','0','".$ct."','Confirmed')";
    
    $result=mysqli_query($conn,$query);
            echo "<div style='  background-color:#fff; margin:0px;padding:25px; text-align:center; font-family:gotham; font-size:35px; margin-top:160px; '><b>Successfully Booked!<br><img src='green_tick.gif'></b>";
            header("refresh:2;url=profile.php");
            die();
        //echo $query;

}
else{
    echo "<div style='font-size:30px; text-align:center;height:40px; background-color:#fff; color:#ff747f; padding:0px;  font-family:gotham; '>Login First<br><img src='eclipse.gif'>";
     header("refresh:2;url=register.php");
     die();
}
?>
    </body></html>