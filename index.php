<?php 
    session_start();


    // if($_SESSION['user_type'] == "Admin"){
    //   header('location: dashboard.php');
    // }else if($_SESSION['user_type'] == "Dean"){
    //   header('location: student.php');
    // }else if($_SESSION['user_type'] == "Teacher"){
    //   header('location: student_panel.php');
    // }else if($_SESSION['user_type'] == "Student"){
    //   header('location: student_panel.php');
    // }
    
    include 'login.php';

    
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="image/Logo.png">
    <title>Login</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Login Page</h1>
      </div>
      <div class="login-box" style="height: 400px;">

        <form class="login-form" action="index.php" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Admin</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="" autofocus name="username">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="" name="password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <!-- label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label> -->
                <p class="semibold-text mb-2"><a href="#" data-toggle="flip"><i class="fa fa-lg fa-fw fa-user"></i>User</a></p>
              </div>
              <p class="semibold-text mb-2"><a href="signup.php"><i class="fa fa-lg fa-fw fa-user-plus"></i> Sign-up</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="login"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
        </form>

        <form class="forget-form" action="index.php" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>User</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="" name="idnum">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="" name="password">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="login1"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN-IN</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-user fa-lg fa-fw"></i> Admin</a></p>
          </div>
        </form>


      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>