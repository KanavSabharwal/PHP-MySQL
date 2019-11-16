<?php
session_start();?>
<?php include('incdn.php') ?>
        <style>
            body{background-color:#47494F;}
            a{text-decoration:none; color:#000;}
        </style>
    </head>


<body>
     <?php include('navinc.php') ?>

<div class="container" style="margin-top:100px;background-color:#fff; font-family:'Myriad Pro';padding:20px; border-radius:10px;">
    <span style="font-size:35px;">
        <b>Give Feedback</b><br></span>
    <div style="font-size:25px;">
        <form action="">
            <input type="text" name="name" placeholder="Your Name"><br>
            <textarea name="fdbk" placeholder="Feedback Content" style="width:500px; margin-top:10px; margin-bottom:10px; height:150px;"></textarea><br>
            <button type="submit">Submit</button>
        </form>
    </div>
    <?php
    if(isset($_REQUEST['fdbk'])){
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
        $nmbr=0;
        $query="update dump set booking=booking+1 where 1";
        $result=mysqli_query($conn,$query);
        $query="select * from dump";
        $result=mysqli_query($conn,$query);
        $row = $result->fetch_assoc();
        $nmbr= $row['booking'];
        $msg="Name : ".$_REQUEST['name']." | Feedback : ".$_REQUEST['fdbk'];
        $query="insert into feedback values(".$nmbr.",'".$msg."')";
        $result=mysqli_query($conn,$query);
    if($result){
        echo "<br>Your feedback is recieved.";
    }
    else{
        echo "Some problem getting your feedback.";
    }
}
    
    
    ?>
    </div>
</body>
</html>