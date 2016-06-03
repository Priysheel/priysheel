<!DOCTYPE html>
<?php

if(isset($_SESSION['user']))
{
  echo "<script>location.href='dashboard.php'</script>";
}
else
{
  include 'constans.php';
}
?>
<html lang="en">
<head><title>Sign In | Rimkool Marketings</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <!--Loading bootstrap css-->
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="vendors/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css">
    <link type="text/css" rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
    <!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="vendors/animate.css/animate.css">
    <link type="text/css" rel="stylesheet" href="vendors/iCheck/skins/all.css">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="css/themes/style1/pink-blue.css" class="default-style">
    <link type="text/css" rel="stylesheet" href="css/themes/style1/pink-blue.css" id="theme-change" class="style-change color-change">
    <link type="text/css" rel="stylesheet" href="css/style-responsive.css">
    <link rel="shortcut icon" href="images/favicon.ico">
</head>
<body id="signin-page">
<div class="page-form">
    <form class="form" method="post">
        <div class="header-content"><h1>Log In</h1></div>
        <div class="body-content">
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-user"></i><input type="text" placeholder="Username" name="username" class="form-control"></div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-key"></i><input type="password" placeholder="Password" name="password" class="form-control"></div>
            </div>
            <div class="form-group pull-right">
                <button type="submit" name="submit" class="btn btn-success">Log In
                    &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            </div>
            <div class="clearfix"></div>
            <div class="forget-password"><h4>Forgotten your Password?</h4>

                <p>no worries, click <a href='#' class='btn-forgot-pwd'>here</a> to recover your password.</p></div>
            <hr>
		</div>
    </form>
    <?php

if(isset($_REQUEST['submit']))
{
  $dbc = mysqli_connect(SERVER, USER, PASSWORD, DATABASE) or die('Sorry We\'re experiencing connection problem');

  $uname=$_REQUEST['username'];
  $pass=$_REQUEST['password'];

  $sql="select * from user where username='".$uname."' and password='".$pass."'";
  $result=mysqli_query($dbc,$sql);
  $row=mysqli_num_rows($result);

  $data=mysqli_fetch_array($result);

  if($row>0 and $uname==$data['username'] and $pass==$data['password'])
  {
    $_SESSION['user']=$data['username'];
	session_start();
    echo "<script>location.href='dashboard.php'</script>";
  }
  else
  {
    echo "Login Failed";
    flush();
  }
}
?>
</div>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<script src="vendors/iCheck/icheck.min.js"></script>
<script src="vendors/iCheck/custom.min.js"></script>
<script>//BEGIN CHECKBOX & RADIO
$('input[type="checkbox"]').iCheck({
    checkboxClass: 'icheckbox_minimal-grey',
    increaseArea: '20%' // optional
});
$('input[type="radio"]').iCheck({
    radioClass: 'iradio_minimal-grey',
    increaseArea: '20%' // optional
});
//END CHECKBOX & RADIO</script>
</body>
</html>