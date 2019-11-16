<?php
session_start();?>
<?php include('incdn.php') ?>
        <style>
            body{background-color:#202B51;}
            a{text-decoration:none; color:#000;}
        </style>
    </head>
    <body ng-app="">

<?php
if(isset($_SESSION['lsucc'])){
    
  
    
    
    ?>
        <div style="margin:auto;  border-radius:10px; padding:25px; font-family:gotham; font-size:20px; background-color:#fff; margin-top:100px; width:500px;">
            <span style="font-size:40px;"><b>Confirmation</b></span>
             <hr>
            <?php
            $_SESSION['airline_number']=$_REQUEST['fnum'];
            echo "<b>Airline number : </b>".$_SESSION['airline_number']."<br>";
            echo "<b>Date : </b>".$_SESSION['fdate']."<br>";
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
    while ($row = mysqli_fetch_assoc($result)) {
        $query1="select count(*) from book where user_email='".$_SESSION['email']."'";
            $result1=mysqli_query($conn,$query1);
    while($row1=$result1->fetch_assoc()){
            $nb=$row1['count(*)'];
    }
    if($nb>5){
        $row['price']=(int)$row['price']-500;
        echo "<b><span style='color:#2A6D0D; font-size:18px;'>500 off for you, being a priviliged customer!</b><br>";
    }
    else{
    }
        
        echo "<b>Amount to pay : </b>".(int)$row['price']."<br>";
    }
        
            ?>
           <br>
            
            <input type="text" placeholder="Passenger Name"><br>
            <input type="text" placeholder="Your Mobile Number" ng-model="mob"><br>
            <br>
<?php
    echo"Do you want to confirm booking ? <br>";
  
    ?>
            <br>
            
            <a href="confirm.php?mob={{mob}}"><b>Yes</b></a><br>
            <a href="#" onclick="history.back();"><b>Go back</b></a>
</div>

   
        <?php
   
//    foreach($_SESSION as $key => $value) 
//{ 
//     echo $key . ' = ' . $value . '<br>'; 
//}  

}
else{
    echo "<div style='font-size:30px; text-align:center;height:40px; background-color:#fff; color:#ff747f; padding:0px;  font-family:gotham; '>Login First<br><img src='eclipse.gif'>";
    
    ?>


<?php
     header("refresh:2;url=register.php");
     die();
}
    ?>
    </body></html>
    