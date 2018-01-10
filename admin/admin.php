<?php 
session_start();
require_once '../DB.php';

if (!isset($_SESSION["is_logged_in"])) {
	header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel | Pilgrim Management System</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/css/styles.css">
	<link rel="stylesheet" href="../assets/css/sidebar.css">
	<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<nav class="navbar  navbar-default navbar-fixed-top" >
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand fa fa-outdent" id="menu-toggle"></a>
        <a class="navbar-brand" href="admin.php">Admin PMS</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="<?php echo !$_GET['action'] ? 'active' : '' ?>"><a href="admin.php">Dashboard</a></li>     
        </ul>
        <ul class="nav navbar-nav navbar-right">
        	<li><a href="logout.php">logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- end navbar -->
    <main id="wrapper" class="menuDisplayed">
      <!--sidebar-->
      <div id="sidebar-wrapper" class="hidden-print">
        <div class="sidebar-header">
          <div class="row">
            <div class="col-xs-12 text-center">
              <h3 style="color: #fcfcfc;">Admin</h3>
            </div>
          </div>
        </div>
        <ul id="sidebar-nav" >
          <li>
            <a href="admin.php">
              <i class="icons fa fa-dashboard fa-fw"></i> Dashboard
            </a>
          </li>
          <li>
            <a href="admin.php?action=add_account_head">
              <i class="icons fa fa-plus-square fa-fw"></i> Add account head
            </a>
          </li>
          <li>
            <a href="admin.php?action=manage_account_head">
              <i class="icons fa fa-cogs fa-fw"></i> Manage account head
            </a>
          </li>
          <li>
            <a href="admin.php?action=add_group_leader">
              <i class="icons fa fa-plus-square fa-fw"></i> Add Group Leader
            </a>
          </li>
          <li>
            <a href="admin.php?action=manage_g_leader">
              <i class="icons fa fa-cogs fa-fw"></i> Manage Group Leaders
            </a>
          </li>
           <li>
            <a href="admin.php?action=add_pilgrim">
              <i class="icons fa fa-plus-square fa-fw"></i> Add Pilgrim
            </a>
          </li>
          <li>
            <a href="admin.php?action=manage_pilgrims">
              <i class="icons fa fa-cogs fa-fw"></i> Manage Pilgrims
            </a>
          </li>
          <li>
            <a href="admin.php?action=add_passport">
              <i class="icons fa fa-plus-square fa-fw"></i> Add Passport info
            </a>
          </li>
          <li>
            <a href="admin.php?action=manage_passports">
              <i class="icons fa fa-cogs fa-fw"></i> Manage Passport Info
            </a>
          </li>
           <li>
            <a href="admin.php?action=add_visa">
              <i class="icons fa fa-plus-square fa-fw"></i> Add Visa info
            </a>
          </li>
          <li>
            <a href="admin.php?action=manage_visa">
              <i class="icons fa fa-cogs fa-fw"></i> Manage Visa Info
            </a>
          </li>
           <li>
            <a href="admin.php?action=add_ticket">
              <i class="icons fa fa-plus-square fa-fw"></i> Add Ticket Flight
            </a>
          </li>
          <li>
            <a href="admin.php?action=manage_tickets">
              <i class="icons fa fa-cogs fa-fw"></i> Manage Ticket Flight
            </a>
          </li>
          <li>
            <a href="admin.php?action=add_package">
              <i class="icons fa fa-plus-square fa-fw"></i> Add package
            </a>
          </li>
          <li>
            <a href="admin.php?action=manage_packages">
              <i class="icons fa fa-cogs fa-fw"></i> Manage Pakages
            </a>
          </li>
          <li>
            <a href="admin.php?action=add_medical_info">
              <i class="icons fa fa-plus-square fa-fw"></i> Add medical info
            </a>
          </li>
          <li>
            <a href="admin.php?action=manage_medical_info">
              <i class="icons fa fa-cogs fa-fw"></i> Manage medical Info
            </a>
          </li>
          <li>
            <a href="admin.php?action=add_expenses">
              <i class="icons fa fa-plus-square fa-fw"></i> Add Expenses
            </a>
          </li>
          <li>
            <a href="admin.php?action=manage_expenses">
              <i class="icons fa fa-cogs fa-fw"></i> Manage expenses
            </a>
          </li>
          <li>
            <a href="admin.php?action=add_agency_info">
              <i class="icons fa fa-plus-square fa-fw"></i> Add agency info
            </a>
          </li>
          <li>
            <a href="admin.php?action=manage_agency_info">
              <i class="icons fa fa-cogs fa-fw"></i> Manage agency info
            </a>
          </li>
          <li>
            <a href="admin.php?action=add_admin">
              <i class="icons fa fa-user fa-fw"></i> Add Admin
            </a>
          </li>
          <li>
            <a href="logout.php"><i class="icons fa fa-sign-out fa-fw"></i> Logout</a>
          </li>
        </ul>
      </div>

      <!--content-->
      <section id="page-content-wrapper">
        <div class="container-fliud">

          <?php
            if(isset($_GET["action"])){

              switch ($_GET['action']) {
                case 'manage_staff':
                  require_once 'includes/manage_staff.php';
                  break;
                case 'add_staff':
                  require_once 'includes/add_staff.php';
                  break;
                case 'manage_g_leader':
                  require_once 'includes/manage_group_leader.php';
                  break;
                case 'add_group_leader':
                  require_once 'includes/add_group_leader.php';
                  break;
                 case 'edit_g_leader':
                  require_once 'includes/edit_g_leader.php';
                  break;
                case 'delete_g_leader':
                  require_once 'includes/delete_g_leader.php';
                  break;
                case 'add_passport':
                  require_once 'includes/add_passport.php';
                  break;
                case 'manage_passports':
                  require_once 'includes/manage_passports.php';
                  break;
                case 'add_visa':
                  require_once 'includes/add_visa.php';
                  break;
                case 'manage_visa':
                  require_once 'includes/manage_visa.php';
                  break;
                case 'add_ticket':
                  require_once 'includes/add_ticket.php';
                  break;
                case 'manage_tickets':
                  require_once 'includes/manage_tickets.php';
                  break;
                case 'add_package':
                  require_once 'includes/add_package.php';
                  break;
                case 'manage_packages':
                  require_once 'includes/manage_packages.php';
                  break;
                case 'add_medical_info':
                  require_once 'includes/add_medical_info.php';
                  break;
                case 'manage_medical_info':
                  require_once 'includes/manage_medical_info.php';
                  break;
                case 'add_account_head':
                  require_once 'includes/add_account_head.php';
                  break;
                case 'manage_account_head':
                  require_once 'includes/manage_account_head.php';
                  break;
                case 'edit_account_head':
                  require_once 'includes/edit_account_head.php';
                  break;
                case 'delete_account_head':
                  require_once 'includes/delete_account_head.php';
                  break;
                case 'add_expenses':
                  require_once 'includes/add_expenses.php';
                  break;
                case 'manage_expenses':
                  require_once 'includes/manage_expenses.php';
                  break;
                case 'add_agency_info':
                  require_once 'includes/add_agency_info.php';
                  break;
                case 'manage_agency_info':
                  require_once 'includes/manage_agency_info.php';
                  break;
                case 'add_pilgrim':
                  require_once 'includes/add_pilgrim.php';
                  break;
                case 'manage_pilgrims':
                  require_once 'includes/manage_pilgrims.php';
                  break;
                case 'edit_pilgrim':
                  require_once 'includes/edit_pilgrim.php';
                  break;
                case 'delete_pilgrim':
                  require_once 'includes/delete_pilgrim.php';
                  break;
                case 'edit_passport':
                  require_once 'includes/edit_passport.php';
                  break;
                case 'delete_passport':
                  require_once 'includes/delete_passport.php';
                  break;
                case 'edit_visa':
                  require_once 'includes/edit_visa.php';
                  break;
                case 'delete_visa':
                  require_once 'includes/delete_visa.php';
                  break;
                case 'edit_ticket':
                  require_once 'includes/edit_ticket.php';
                  break;
                case 'delete_ticket':
                  require_once 'includes/delete_ticket.php';
                  break;
                case 'edit_package':
                  require_once 'includes/edit_package.php';
                  break;
                case 'delete_package':
                  require_once 'includes/delete_package.php';
                  break;
                case 'edit_medical_info':
                  require_once 'includes/edit_medical_info.php';
                  break;
                case 'delete_medical_info':
                  require_once 'includes/delete_medical_info.php';
                  break;
                case 'edit_expense':
                  require_once 'includes/edit_expense.php';
                  break;
                case 'delete_expense':
                  require_once 'includes/delete_expense.php';
                  break;
                case 'edit_agency_info':
                  require_once 'includes/edit_agency_info.php';
                  break;
                case 'delete_agency_info':
                  require_once 'includes/delete_agency_info.php';
                  break;
                case 'add_admin':
                  require_once 'includes/add_admin.php';
                  break;
                default:
                  require_once 'includes/404.php';
                  break;
              }

            }else{
              require_once 'includes/admin_panel.php';
            }

          ?>
        </div>
      </section>
    </main>


  	<script src="../assets/js/jquery.min.js"></script>
  	<script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function(){
        $('#menu-toggle').click(function(e){
         e.preventDefault();
          $('#wrapper').toggleClass('menuDisplayed');
        });
      });
    </script>
</body>
</html>