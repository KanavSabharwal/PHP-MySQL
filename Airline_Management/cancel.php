<?php
session_start();
?>
<html>
    <head>
    </head>
    <body style="background-color:#202B51; margin:0px;">
         <div style="margin:auto;  border-radius:10px; padding:25px; font-family:gotham; font-size:20px; background-color:#fff; margin-top:100px; width:500px; text-align:center; font-weight:bold;">
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
        $b_no=$_REQUEST['booking_number'];
        $query="delete from book where booking_number=".$b_no."";
        //echo $query;
        $result=mysqli_query($conn,$query);
    if($result){
        echo "Successfully Cancelled!";
    }
    else{
        echo "Some problem";
    }
     header("refresh:0;url=profile.php");
     die();

}
else{
    echo "<div style='font-size:30px; text-align:center;height:40px; background-color:#fff; color:#ff747f; padding:0px;  font-family:gotham; '>Login First<br><img src='eclipse.gif'>";
     header("refresh:2;url=register.php");
     die();
}
?>
        </div>
    </body></html>