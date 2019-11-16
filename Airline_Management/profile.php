<?php session_start(); 

if(isset($_SESSION['pverify'])){
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

    $query="select * from user where email='".$_SESSION['email']."'";
    $result=mysqli_query($conn,$query);
    $arr=mysqli_fetch_array($result);
    ?>

<?php include('incdn.php') ?>
        <style>
            body{font-family:gotham;}
            nav.navbar{background-color:#000;}
            input{ background: transparent;}
            input:focus,
            select:focus,
            textarea:focus,
            button:focus {outline: 1px solid #e3e3e3;}
             div#cancel{left:40px; color:#DF132E; margin-top:10px; margin-bottom:10px; border:1px solid #DF132E; text-align:center;border-radius:5px;}
            div#cancel:hover{background-color:#DF132E; color:#fff;}
            div#cancel a:hover{ color:#fff;}
        </style>
    </head>
    <body>
        
        <?php include('navinc.php') ?>
        <div class="container" style="margin-top:30px;">Hello, 
            <span style="font-family:gotham; font-size:25px; font-weight:bold;">
                <?php echo $arr['name']; ?></span><br>
            Your current email : <span style="font-family:gotham; font-size:20px; ">
                <?php echo $arr['email']; ?></span>
            <br><?php
            $query="select count(*) from book where user_email='".$_SESSION['email']."'";
            $result=mysqli_query($conn,$query);
    while($row=$result->fetch_assoc()){
            $nb=$row['count(*)'];
    }
    if($nb>5){
        echo "<b>You are a priviliged customer</b>";
    }
    else{
        echo "<b>Become a priviliged customer and get rewards</b>";
    }
//    echo $nb;
    
            ?><br>
            <div class="row">
                <div class="col-sm-6">
                
                
            
           
            <span style="font-size:35px;">
                Your Bookings:</span> <br><br>
            
            <?php
                $query="select * from book where user_email='".$_SESSION['email']."'";
                $result=mysqli_query($conn,$query);
                 while ($row = $result->fetch_assoc()) {
                     if($row['airline_num']!='0'){
                     ?>
            
                <div style="padding:10px; border:3px solid #e3e3e3; color:#345; border-radius:5px; width:400px;">
                    <b> Booking Type </b>: Flight<br>
                    <b>Booking Number </b>:
                    <?php  echo  $row['booking_number']; ?> <br>
                    <b>Airline Number </b>: 
                    <?php  echo  $row['airline_num']; ?>
                    <div id="cancel"><a href="cancel.php?booking_number=<?php echo $row['booking_number']; ?>">Cancel Booking</a></div>
                </div>
           
            <?php
                     
                     }
                   else if($row['train_num']!='0'){
                     ?>
            
                <div style="padding:10px; border:3px solid #e3e3e3; color:#345; border-radius:5px; width:400px;">
                    <b> Booking Type </b>: Train<br>
                    <b>Booking Number </b>:
                    <?php  echo  $row['booking_number']; ?> <br>
                    <b>Train Number </b>: 
                    <?php  echo  $row['train_num']; ?>
                    <div id="cancel"><a href="cancel.php?booking_number=<?php echo $row['booking_number']; ?>">Cancel Booking</a></div>
                </div>
           
            <?php
                     
                     }
                     
                     else if($row['hotel_code']!='0'){
                     ?>
            
                <div style="padding:10px; border:3px solid #e3e3e3; color:#345; border-radius:5px; width:400px;">
                    <b> Booking Type </b>: Hotel<br>
                    <b>Booking Number </b>:
                    <?php  echo  $row['booking_number']; ?> <br>
                    <b>Hotel Code </b>: 
                    <?php  echo  $row['hotel_code']; ?>
                    <div id="cancel"><a href="cancel.php?booking_number=<?php echo $row['booking_number']; ?>">Cancel Booking</a></div>
                </div>
           
            <?php
                     
                     } 
                 
                 }
            ?>
                    </div>
           
            </div></div>
           
        <?php include('inc1.php'); ?>
        
<?php
}
else{
    echo "Wrong page";
     header("refresh:3;url=index.php");
     die();
}


?>
