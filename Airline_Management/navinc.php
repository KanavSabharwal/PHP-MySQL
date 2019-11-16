<nav class="navbar navbar-default" style="border:0px;margin:0px;" >
  <div class="container-fluid" style="background: url('https://www.toptal.com/designers/subtlepatterns/patterns/noisy_net.png'); ">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     
      <a class="navbar-brand"style="color:#fff;" href="index.php"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" style="border:0px;"id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" >
        <li><a href="#" style="color:#fff;"></a></li>
        <li><a href="#" style="color:#fff;"></a></li>
       
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
          <?php
          if(isset($_SESSION['pverify'])){
          echo "<li><a href='profile.php' style='color:#fff;'>Profile</a></li><li><a href='logout_redirect.php' style='color:#fff;'>Logout</a></li>";
          } 
else {
          ?>
        <li><a href="register.php" style="color:#fff;">Login</a></li>
        <li><a href="register.php" style="color:#fff;">Register</a></li>
          <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>