<?php
session_start();?>
<html>
    <head>
        <style>
            body{background-color:#363535;}
            a{text-decoration:none; color:#000;}
        </style>
    </head>
    <body>

<?php
if(isset($_SESSION['lsucc'])){
    
  
    
    
    ?>
        <div style="margin:auto;  border-radius:10px; padding:25px; font-family:gotham; font-size:20px; background-color:#fff; margin-top:100px; width:500px;">
            Confirmation
             <hr>
            <?php
            echo "<b>Hotel code : </b>".$_SESSION['hotel_code']."<br>";
            echo "<b>Date : </b>".$_SESSION['hdate']."<br>";
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

        $query="select * from hotel where hotel_code='".$_SESSION['hotel_code']."'";
        $result=mysqli_query($conn,$query);
    while ($row = mysqli_fetch_assoc($result)) {
        //echo "<b>Amount to pay : </b>".$row['price']."<br>";
    }
    $query="select * from hotel_room where hotel_code='".$_SESSION['hotel_code']."'";
    
                    $result=mysqli_query($conn,$query);
                    $arr=mysqli_fetch_array($result);
            if($arr['deluxe_p']>0){
                echo "<input type='radio' value='deluxe'>";
                echo "Deluxe : ".$arr['deluxe_p']."<br>";}
            if($arr['superdeluxe_p']>0){
                echo "<input type='radio' value='super_deluxe'>";
                echo "Super Deluxe : ".$arr['superdeluxe_p']."<br>";}
            if ($arr['suite_p']>0){
                echo "<input type='radio' value='suite'>";
                echo "Suite : ".$arr['suite_p'];}
    
        
            ?>
           <br><br>
<?php
    echo"Do you want to confirm booking ? <br>";
  
    ?>
            <br>
            <a href="confirm_train.php"><b>Yes</b></a><br>
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
    