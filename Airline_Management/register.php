<?php session_start() ?>
<?php include('incdn.php') ?>
        <title>Register</title>
        <style>
            body{font-family:gotham;}
            nav.navbar{background-color:#000;}
            input{ background: transparent; border:0px; font-size:30px; color:#fff;}
            input:focus,
            select:focus,
            textarea:focus,
            button:focus {outline: 0px solid #e3e3e3;}
            ::-webkit-input-placeholder { 
  color: #fff;
}
::-moz-placeholder { 
  color: #fff;
}
:-ms-input-placeholder { 
  color: #fff;
}
:-moz-placeholder { 
  color: #fff;
}
        </style>
    </head>
    <body>
        <?php include('navinc.php') ?>
        <br>
    <div class="container" style="height:100%;">
        <br>
        <div class="row">
            <div class="col-sm-6" style="font-size:30px;height:400px; padding:20px; background-color:#191d22; border:0px solid #e3e3e3;border-radius:0px; color:#fff; ">
         <form action="#">
             <span style="font-size:35px;"><b>Login</b></span><br>
          <br>
            <input type="text" placeholder="E-Mail" name="lemail"><br>
            <input type="password" placeholder="Password" name="lpass"><br>
             <div style="text-align:right; width:100%;"><br><button type="submit" style="padding:5px; font-size:25px; margin-top:10px;background:transparent; border:1px solid #fff;border-radius:15px;"><b>Submit</b></button>
             
             <?php
    if(isset($_REQUEST['lemail']) and isset($_REQUEST['lpass'])){
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

            $query="select email from user where email='".$_REQUEST['lemail']."' and password='".$_REQUEST['lpass']."'";
            $result=mysqli_query($conn,$query);
            $arr=mysqli_fetch_array($result);
    if($arr){echo "<br>Login Successfull";
             $_SESSION['lsucc']=1;
             $_SESSION['email']=$_REQUEST['lemail'];
            $_SESSION['password']=$_REQUEST['lpass'];
            header("refresh:0;url=register_redirect.php");
            die();
            
            }
    else{echo "Login Unsuccesfull";}
}
                 ?>
             </div>
                </form></div>
            <div class="col-sm-6" style="font-size:30px;height:400px; padding:20px; background-color:#0e1115;color:#fff; border:0px solid #e3e3e3;border-radius:0px;">
        <form action="register_redirect.php">
            <span style="font-size:35px;">Register</span><br><br>
            <input type="text" placeholder="Name" name="name"><br>
            <input type="text" placeholder="E-Mail" name="email"><br>
            <input type="password" placeholder="Password" name="password"><br>
            <div style="text-align:right; width:100%;"><button type="submit" style="padding:5px; font-size:25px; margin-top:10px;background:transparent;color:#fff; border:1px solid #fff;border-radius:15px;"><b>Submit</b></button></div>
        </form></div>
            
        </div>
        </div>
        
    </body>
</html>