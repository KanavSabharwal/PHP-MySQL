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
        echo "From : ".$_REQUEST['rfrom']."<br>";
        echo "To : ".$_REQUEST['rto']."<br></span><br>";
        
        $timestamp = strtotime($_REQUEST['rdate']);
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

        $query="select * from train where from_s='".$_REQUEST['rfrom']."' and to_s='".$_REQUEST['rto']."'";
        //echo $query;
        
        $x=0;
        $result=mysqli_query($conn,$query);
        while ($row = mysqli_fetch_assoc($result)) {
            $query="select * from train_days where train_number='".$row['train_number']."'";
            $result=mysqli_query($conn,$query);
            $arr=mysqli_fetch_array($result);
            if ($arr[$day]==1){
                $x++;}
          }
        echo "<b>".$x." result found<br></b><br>";
        $query="select * from train where from_s='".$_REQUEST['rfrom']."' and to_s='".$_REQUEST['rto']."'";
        $result=mysqli_query($conn,$query);
        while ($row = mysqli_fetch_assoc($result)) {
                    $query="select * from train_days where train_number='".$row['train_number']."'";
                    $result=mysqli_query($conn,$query);
                    $arr=mysqli_fetch_array($result);
                    if ($arr[$day]==1){
                       
                  
                    echo "<div class='row' style='border:2px solid #e3e3e3; font-size:20px; padding:5px; border-radius:5px;'><div class='col-sm-4'> ".$row["train_name"]."<br>";
                    echo $row["train_number"]."</div>";
                        
                    $_SESSION['train_number']=$row["train_number"];
                    
                    ?>
                <div class="col-sm-4">
                    <?php 
                    echo "Date : ".$_REQUEST['rdate']."<br>";
                    
                    $timeexp = explode(':', $row['from_t']);
                    $timeexp1 = explode(':', $row['to_t']);
                    echo $timeexp[0].":".$timeexp[1]." - ".$timeexp1[0].":".$timeexp1[1];
                    
                   
                    ?>
                </div>
                 <div class="col-sm-4" style="font-size:25px; font-weight:bold;">
                    <?php 
                    echo "Rs. ".$row['price']."<br>";
                    
                    
                    
            
                     
                 ?>
                     <br>
                     <button style="border-radius:5px; background-color:#fff; color:#fff;padding:5px; border:0px;"><a href="booking_train.php">Book Train</a></button>
                </div>
                <?php
                    echo "<br></div><br>";

                    }}
        ?>      
                     
                     
                     
                     
                     
                     
                     
                     
                     
                
    
        </div>
    </body>
</html>