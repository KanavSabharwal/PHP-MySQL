<?php session_start() ?>
<?php include('incdn.php') ?>
        <style>
            body{font-family:gotham;}
            nav.navbar{background-color:#000;}
            input{ background: transparent;}
            input:focus,
            select:focus,
            textarea:focus,
            button:focus {outline: 1px solid #e3e3e3;}
        </style>
    </head>
    <body>
        
        <?php include('navinc.php') ?>
        <div class="container">
            <span style="font-size:20px; ">
       <?php
        echo "Where : ".$_REQUEST['hloc']."<br></span><br>";
        
        $timestamp = strtotime($_REQUEST['hdate']);
        $_SESSION['hdate']=$_REQUEST['hdate'];
        $day= strtolower(date("D", $timestamp));
        
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

        $query="select * from hotel where city='".$_REQUEST['hloc']."'";
        //echo $query;
        
        $x=0;
        $result=mysqli_query($conn,$query);
        while ($row = mysqli_fetch_assoc($result)) {
           
                $x++;
          }
        echo "<b>".$x." result found<br></b><br>";
        $query="select * from hotel where city='".$_REQUEST['hloc']."'";
        $result=mysqli_query($conn,$query);
        while ($row = mysqli_fetch_assoc($result)) {
                       
                  
                    echo "<div class='row' style='border:2px solid #e3e3e3; font-size:20px; padding:5px; border-radius:5px;'><div class='col-sm-4'> ".$row["hotel_name"]."<br>";
                    echo $row["hotel_code"]."</div>";
                    ?>
                <div class="col-sm-4">
                    <?php 
                    echo "Date : ".$_REQUEST['hdate']."<br>";
                    echo "".$row['address']."<br>";
                    
                   
                    
                   
                    ?>
                </div>
                 <div class="col-sm-4" style="font-size:25px; font-weight:bold;">
                    <?php 
                    $query="select * from hotel_room where hotel_code='".$row['hotel_code']."'";
                    $result=mysqli_query($conn,$query);
                    $arr=mysqli_fetch_array($result);
            if($arr['deluxe_p']>0){
                echo "Deluxe : ".$arr['deluxe_p']."<br>";}
            if($arr['superdeluxe_p']>0){
                echo "Super Deluxe : ".$arr['superdeluxe_p']."<br>";}
            if ($arr['suite_p']>0){
                echo "Suite : ".$arr['suite_p'];}
                    $_SESSION['hotel_code']=$row['hotel_code'];
                   
                     ?>
                     <br>
                     <button style="border-radius:5px; background-color:#fff; color:#fff;padding:5px; border:0px;"><a href="booking_hotel.php">Book Hotel</a></button>
                </div>
                <?php
                    echo "<br></div><br>";

                    }
        ?>     
        </div>
    </body>
</html>