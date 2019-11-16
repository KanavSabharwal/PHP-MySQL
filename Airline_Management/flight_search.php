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
            <div class="container" style="margin-top:30px;">
            <div class="row" style="">
           
                <div class="col-sm-12" style="">
                
            <form action="flight_search.php" style="padding-top:30px;text-align:center;">
                Change your flight here<br>
            <input type="text" placeholder="From" name="ffrom" value="<?php echo $_REQUEST['ffrom']; ?>"style="border:0px; font-size:30px;"><br>
            <input type="text" placeholder="To" name="fto" value="<?php echo $_REQUEST['fto']; ?>"style="border:0px; font-size:30px;"><br>
            <input type="date" name="fdate" style="border:0px; value="<?php echo $_REQUEST['fdate']; ?>" font-size:30px;"  min="<?php echo date("Y-m-d"); ?>" max="2018-02-01"><br>
                <button type="submit" style="padding:0px; margin-top:10px;width:100px; height:30px; background-color:#fff; border:1px solid #e3e3e3; font-size:16px; border-radius:15px;"><b>Search</b></button>
            </form>
           
                </div>
        </div>
        </div>
            <span style="font-size:20px; ">
       <?php
        //echo "From : ".$_REQUEST['ffrom']."<br>";
        //echo "To : ".$_REQUEST['fto']."<br></span><br>";
if($_REQUEST['fdate']==''){echo "Set the Date!";}
else{

        $timestamp = strtotime($_REQUEST['fdate']);
        $_SESSION['fdate']=$_REQUEST['fdate'];
if($_REQUEST['ffrom']==$_REQUEST['fto']){
    echo "Source and Destination are same!<br>";

}

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

        
       
        $x=0;
        
        $query="select * from airline where from_s='".$_REQUEST['ffrom']."' and to_s='".$_REQUEST['fto']."'";
        //echo $query;
        $result=mysqli_query($conn,$query);
        while ($row = $result->fetch_assoc()) {
            
            $query1="select * from airline_days where airline_number='".$row['airline_number']."'";
            $result1=mysqli_query($conn,$query1);
            $arr=mysqli_fetch_array($result1);
            
            if ($arr[$day]==1){
              $x++;}
          }














        echo "<b>".$x." result found<br></b><br>";
        $query="select * from airline where from_s='".$_REQUEST['ffrom']."' and to_s='".$_REQUEST['fto']."'";
        $result=mysqli_query($conn,$query);
         while ($row = $result->fetch_assoc()) {
                    $query1="select * from airline_days where airline_number='".$row['airline_number']."'";
                    $result1=mysqli_query($conn,$query1);
                    $arr=mysqli_fetch_array($result1);
                    if ($arr[$day]==1){
                       
                     echo "<div class='row' style='border:2px solid #e3e3e3; font-size:20px; padding:5px; border-radius:5px;'><div class='col-sm-4'> <img src='images/".$row["airline_name"].".png' width='100px' height='100px'>"; 
                    echo "<br>";
                       
                    echo "<b><span style='font-size:16px;'>".$row['airline_name']." - ".$row["airline_number"]."</span></b></div>";
                    ?>
                <div class="col-sm-4">
                    <?php 
                    echo "Date : ".$_REQUEST['fdate']."<br>";
                    
                    $timeexp = explode(':', $row['from_t']);
                    $timeexp1 = explode(':', $row['to_t']);
                    echo $timeexp[0].":".$timeexp[1]." - ".$timeexp1[0].":".$timeexp1[1];
                    
                   
                    ?>
                </div>
                 <div class="col-sm-4" style="font-size:25px; font-weight:bold;">
                    <?php 
                    echo "Rs. ".$row['price']."<br>";
                    
                    
                    $_SESSION['airline_number']=$row['airline_number'];
                   
                    ?>
                     <br>
                     <button style="border-radius:5px; background-color:#fff; color:#fff;padding:5px; border:0px;"><a href="booking.php?fnum=<?php echo $row['airline_number']; ?>">Book Flight</a></button>
                </div>
                <?php
                    echo "<br></div><br>";

                    }}
    
}
        ?> 
        </div>
    </body>
</html>