<?php 

    if(isset($_SESSION['user'])){
      $username = $_SESSION['user'];
    }else{
      header('location: index.php');
    }
 ?>
<header class="app-header"><a class="app-header__logo" href="dashboard.php"><?php echo $username; ?></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
       
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div></a></li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <?php 
              if($_SESSION['user_type'] == "Admin"){
                echo '<li><a class="dropdown-item admin_prof" href="profile_admin.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>';
              }else if($_SESSION['user_type'] == "Dean"){
                echo '<li><a class="dropdown-item dean_prof" href="profile_dean.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>';
              }else if($_SESSION['user_type'] == "Dean" OR $_SESSION['user_type'] == "Treasurer"){
                echo '<li><a class="dropdown-item stud_prof" href="profile_student.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>';
              }
             ?>
            
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="text-center"><img class="app-sidebar__user-avatar" src="image/logo.png" alt="User Image" style="width: 100px; height: 100px;">
        <div>
          
        </div>
      </div>
      <br>
      <p class="app-sidebar__user-name" style="text-align: center; color: white;">GINGOOG CITY COLLEGES</p>
      <br>
      <hr style="background-color: #009688; height: 1px;">
      <ul class="app-menu">
        <?php 
            if($_SESSION['user_type'] == "Admin"){
              echo '<li><a class="app-menu__item" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>';
              echo '<li><a class="app-menu__item" href="program_heads.php"><i class="app-menu__icon fa fa-group"></i><span class="app-menu__label">Program Heads</span></a></li>';
              echo '<li><a class="app-menu__item" href="departments.php"><i class="app-menu__icon fa fa-folder"></i><span class="app-menu__label">Departments</span></a></li>';
               echo '<li><a class="app-menu__item" href="user_log.php"><i class="app-menu__icon fa fa-clock-o"></i><span class="app-menu__label">User Log</span></a></li>';
            }else if($_SESSION['user_type'] == "Dean"){
              echo '<li><a class="app-menu__item" href="proghead_dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

                  <li><a class="app-menu__item" href="student.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Student</span></a></li>

                  <li><a class="app-menu__item" href="payments.php"><i class="app-menu__icon fa fa-plus"></i><span class="app-menu__label">Payment</span></a></li>

                  <li><a class="app-menu__item" href="miscellaneous.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Student miscellaneous</span></a></li>

                  <li><a class="app-menu__item" href="expenses.php"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Expenses</span></a></li>

                  <li><a class="app-menu__item" href="payment_history.php"><i class="app-menu__icon fa fa-clock-o"></i><span class="app-menu__label">Payment History</span></a></li>

                  <li><a class="app-menu__item" href="log_history.php"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Log History</span></a></li>';
            }else if($_SESSION['user_type'] == "Treasurer"){
               echo '<li><a class="app-menu__item" href="student_panel.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Dashboard</span></a></li>

                 <li><a class="app-menu__item" href="payments_treasurer.php"><i class="app-menu__icon fa fa-plus"></i><span class="app-menu__label">Payments</span></a></li>

                 <li><a class="app-menu__item" href="studentpanel_payment_history.php"><i class="app-menu__icon fa fa-clock-o"></i><span class="app-menu__label">Payment History</span></a></li>';
            }else if($_SESSION['user_type'] == "Student"){
               echo '<li><a class="app-menu__item" href="student_panel.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Dashboard</span></a></li>

                 <li><a class="app-menu__item" href="studentpanel_payment_history.php"><i class="app-menu__icon fa fa-clock-o"></i><span class="app-menu__label">Payment History</span></a></li>';

            }
         ?>
        

        
        
      </ul>
    </aside>