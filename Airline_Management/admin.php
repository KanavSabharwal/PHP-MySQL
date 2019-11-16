<?php
session_start();
?>
<?php include('incdn.php') ?>
<style>
    body{
    background-color:#211445;
    }
    .container{background-color:#fff; border-radius:10px; margin-top:30px;}
    table td{
        padding:10px;
        border:1px solid #e3e3e3;
    }
    input {
    padding:5px;
        font-size:20px;
        font-family:gotham;
        border:3px solid #e3e3e3;
    }
</style>
    </head>
    <body style="background-color:#ff; margin:0px;">
      
        <div class="container">
            <a href="index.php">Home</a><img src="images/admin.png" style="float:right;width:180px; height:auto;">
            <div style="font-weight:bold; font-size:28px; font-family:gotham;margin-top:20px;">Admin cPanel<hr>
                
            </div>
           

            <div class="row">
                <div class="col-sm-6">
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <b>Add Users</b><br>
                    <form action="#">
                        <input type="email" name="email" placeholder="E-Mail">
                        <input type="text" name="ausername" placeholder="Username">
                        <input type="password" name="password" placeholder="password">
                        <button type="submit">Add User</button>
                    </form>
                    
        
                        <?php
if(isset($_REQUEST['del_user'])){
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
        $query="delete from user where email='".$_REQUEST['del_user']."'";
        $result=mysqli_query($conn,$query);
    if($result){
        echo "Removed";
        
    }
    else{
        echo "Problem in removing";
    }
}
                        ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
                <div class="col-sm-6">
                 <form action="" style="margin-top:20px; margin-bottom:200px;">
                <b>Send Message to customer : </b><br>
            <input type="text" name="mobile" placeholder="Mobile Number"><br>
            <textarea placeholder="Your Message" name="msg" style="width:300px; height:200px;"></textarea><br>
                <button type="submit">Send</button>
            </form>
                
                
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <b>Delete Users</b>
                    <?php 
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
        $query="select * from user";
 $result=mysqli_query($conn,$query);
       
       ?><table><?php
while($row=$result->fetch_assoc()){
    ?><tr>
                    <?php
    
    $q1="select count(*) from book where user_email='".$row['email']."'";
    $r1=mysqli_query($conn,$q1);
    while ($r = $r1->fetch_assoc()) {
        if($r['count(*)']>=5){
            $mm="Priviliged Customer";
        }
        else{
            $mm="Not a priviliged customer";
        }
          echo "<td>".$row['name']."</td><td>".$row['email']."</td><td><a href='?del_user=".$row['email']."'>Remove User</a><td>".$r['count(*)']."</td><td>".$mm."</td>";
    echo "</tr>";
}
    
    
  
}
       
                
                    ?></table>
                    </div>
            </div>
            <div class="row">
                 <b>
                Add Flights</b><br>
                <div class="col-sm-6">
            <form action="">
                <input type="text" placeholder="From" name="from_f"><br>
                <input type="text" placeholder="To" name="to_f"><br>
                <input type="text" placeholder="Airline Name" name="airline_name"><br>
                <input type="text" placeholder="Duration" name="duration_f"><br>
                <input type="text" placeholder="Seats Left" name="seats_f"><br>
                <input type="text" placeholder="Airline Number" name="airline_number_f"><br>
                <input type="text" placeholder="Price" name="price_f"><br>
                <input type="text" placeholder="From Time" name="from_time_f"><br>
                <input type="text" placeholder="To Time" name="to_time_f"><br>
                <input type="submit" value="Add">
                <?php
   
    if(isset($_REQUEST['airline_number_f'])){
    
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
        
        $query="insert into airline values('".$_REQUEST['from_f']."','".$_REQUEST['to_f']."','".$_REQUEST['airline_name']."','".$_REQUEST['duration_f']."','".$_REQUEST['seats_f']."','".$_REQUEST['airline_number_f']."','".$_REQUEST['price_f']."','".$_REQUEST['from_time_f']."','".$_REQUEST['to_time_f']."')";
    
    //echo $query;
    $result=mysqli_query($conn,$query);
    if($result){
        echo "<b><span style='color:#27b237;'>Added!</span></b>";
    }
    else{
        echo "<b><span style='color:#d8391f;'>Problem Adding</span></b>";
    }
    
    
    $query="insert into airline_days values(1,1,1,1,1,1,1,'".$_REQUEST['airline_number_f']."')";
    
    //echo $query;
    $result=mysqli_query($conn,$query);
    if($result){
        echo "<b><span style='color:#27b237;'>Days also added!</span></b>";
    }
    else{
        echo "<b><span style='color:#d8391f;'>Problem Adding days</span></b>";
    }
    
    
    
    
}
                
                ?>
                
            </form>
                </div>
                <div class="col-sm-6">
                    
                    <b>Existing Fights</b>
                    <?php
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
        $query="select * from airline";
 $result=mysqli_query($conn,$query);
       
       ?><table><?php
while($row=$result->fetch_assoc()){
    ?><tr>
                    <?php
    echo "<td>".$row['airline_number']."</td><td>".$row['from_s']."</td><td>".$row['to_s']."<td><a href='?del_flight=".$row['airline_number']."'>Remove Airline</a>";
    
}


                    ?></table>
                </div>
                
                 <?php
if(isset($_REQUEST['del_flight'])){
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
        $query="delete from airline where airline_number='".$_REQUEST['del_flight']."'";
        $result=mysqli_query($conn,$query);
    if($result){
        echo "Removed";
        
    }
    else{
        echo "Problem in removing";
    }
}
                        ?>
                
                
                
                
                
                
                
                
                
            </div><hr>
                        
                    
                    
           
            
            
            <br>
           
            <?php
if(isset($_REQUEST['mobile'])){
     include('way2sms-api.php');
    sendWay2SMS ( '7530000108' , 'N9575H' , $_REQUEST['mobile'] ,$_REQUEST['msg']);   
}
            
            
            ?>
            
            
        
    
        
        <?php
if(isset($_REQUEST['ausername'])){
    //echo "Adding...";
    $s=0;
    $check="select * from user where email='".$_REQUEST['email']."'";
    $result=mysqli_query($conn,$query);
    while($row=$result->fetch_assoc()){
        echo "hey";
        $s=1;
    }
    
    echo $s;
    $query="insert into user values('".$_REQUEST['email']."','".$_REQUEST['ausername']."','".$_REQUEST['password']."')";
    //echo $query;
    
    $result=mysqli_query($conn,$query);
    if($result){
        echo "Added!";
    }
    else{
        echo "Problem in adding";
    }
}

                    ?>
        
        <br>
  
            
            
            
            
            <div class="row">
                <div class="col-sm-6">
                    <b>Feedback Recieved : <br></b>
                    <hr>
                    <table>
                    <?php
                    $query="select * from feedback";
                    $result=mysqli_query($conn,$query);

while($row = $result->fetch_assoc()){
    echo "<tr><td>".$row['feedback_number']."</td><td>".$row['feedback_content']."</td>";
    echo "</tr>";

}
                        
                        
                        ?>
                    </table>
                </div>
                
                
                
                
                
                
        </div>   
        
        </div>
        
             
        
    
        
        
    </body></html>