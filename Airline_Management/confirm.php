<?php
session_start();
?>
<html>
    <head>
    </head>
    <body style="background-color:#202B51; margin:0px;">
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
    
        $query="select * from airline where airline_number='".$_SESSION['airline_number']."'";
        $result=mysqli_query($conn,$query);
        $row = $result->fetch_assoc();
        if($row['seats_left']==0){
            echo "Sorry no seats left!";
            header("refresh:2;url=index.php");
            die();
        }
        $query_inc='update dump set booking=booking+1;';
        $result=mysqli_query($conn,$query_inc);
        $count='SELECT * FROM dump;';
        $result=mysqli_query($conn,$count);
        while ($row = $result->fetch_assoc()) {$ct= $row['booking'];}
    echo $ct;
        $ct++;
    $query="update  airline set seats_left=seats_left-1 where airline_number='".$_SESSION['airline_number']."'";
     $result=mysqli_query($conn,$query);
        $query="insert into book values('".$_SESSION['email']."','".$_SESSION['airline_number']."','0','0','".$ct."','Confirmed')";
    
    $result=mysqli_query($conn,$query);
            echo "<div style='  background-color:#fff; margin:0px;padding:25px; text-align:center; font-family:gotham; font-size:35px; margin-top:160px; '><b>Successfully Booked!<br><img src='green_tick.gif'></b>";
    include('way2sms-api.php');
    $query="select * from airline where airline_number='".$_SESSION['airline_number']."'";
        $result=mysqli_query($conn,$query);
    $row = $result->fetch_assoc();
    
    sendWay2SMS ( '7530000108' , 'N9575H' , $_REQUEST['mob'] ," Your flight from ".$row['from_s']." to ".$row['to_s'].". Airline number : ".$_SESSION['airline_number']." is succesfully booked.Booking number : ".$ct);
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
        <?php
    
    
?>
    </body></html>