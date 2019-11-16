<?php
session_start();
if(isset($_SESSION['lsucc'])){
    $_SESSION['pverify']=1;
    
    
    echo "<div style='font-size:30px; text-align:center;height:40px; background-color:#fff; color:#ff747f; padding:0px;  font-family:gotham; '>Redirecting you to your profile<br><img src='eclipse.gif'>";
     header("refresh:3;url=profile.php");
     die();
}
else{
$_SESSION['name']=$_REQUEST['name'];
$_SESSION['email']=$_REQUEST['email'];
$_SESSION['password']=$_REQUEST['password'];
    if(strlen($_SESSION['name'])==0 or strlen($_SESSION['email'])==0 or strlen($_SESSION['password'])==0){
        echo "<div style='margin:auto; width:100%; text-align:center; font-size:25px;font-family:gotham;'><b>Don't input empty strings</b></div>";
       header("refresh:3;url=register.php");
     die();
    }
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

$query="select email from user where email='".$_SESSION['email']."'";
$result=mysqli_query($conn,$query);
$arr=mysqli_fetch_array($result);

echo '<br>';
$flag=0;
if($arr){
    $flag=1;
}
 if($flag==1)
 {
    echo "<div style='font-size:30px; text-align:center;height:40px; background-color:#fff; color:#ff747f; padding:0px;  font-family:gotham; '>Email already exists<br>Choose different email<br>Redirecting........<br><img src='eclipse.gif'>";
     header("refresh:5;url=register.php");
     die();
 }
else{
    
    $query="insert into user(name,email,password) values('".$_SESSION['name']."','".$_SESSION['email']."','".$_SESSION['password']."')";
$result=mysqli_query($conn,$query);
  
    if($result){
         echo "<div style='font-size:30px; text-align:center;height:40px; background-color:#fff; color:#ff747f; padding:0px;  font-family:gotham; '>Welcome ".$_SESSION['name']."<br>Your account is successfully created<br>Login with your credentials now<br><img src='eclipse.gif'>";
     header("refresh:5;url=register.php");
     die();
    
    }
    else{
        echo "Error";
    }


}
}
?>