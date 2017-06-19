<?php //login.php
  require_once 'header.php';

  echo <<<_END
          <!-- Bootstrap Core CSS -->
          <link href="css/bootstrap.min.css" rel="stylesheet">

          <!-- Custom Fonts -->
          <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
_END;

  session_start();
  mysql_connect("localhost","root","");
  mysql_select_db("yourshoes");

  $error = $Email = $Password = "";

  if (isset($_POST['Email']))
  {
    $Email = sanitizeString($_POST['Email']);
    $Password = sanitizeString($_POST['Password']);

  $strSQL = "SELECT * FROM users WHERE Email = '".mysql_real_escape_string($_POST['Email'])."'and Password = '".mysql_real_escape_string($_POST['Password'])."'";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);
  
  if(!$objResult) {
    $error = "Username and Password Incorrect!";
  } else {
    $_SESSION["Email"] = $objResult["Email"];
    $_SESSION["Status"] = $objResult["Status"];

    session_write_close();

    if($objResult["Status"] == "ADMIN") {
      die("<div class='alert alert-success'>".
          "Welcome Back! You are now logged in. ".
            "</div><meta http-equiv='refresh' content='3; URL=admin.php'>");
    } else {
      //header("location:index.php");
      die("<div class='alert alert-success'>".
          "You are now logged in. ".
            "</div><meta http-equiv='refresh' content='3; URL=index.php'>");
    }
  }
}
  mysql_close();

  //echo "<div class='main'><h3>Please enter your details to log in</h3>";
/*  $error = $Email = $Password = "";

  //$admail = 'admin@admin.com';
  //$adpass = 'admin';

  if (isset($_POST['Email']))
  {
    $Email = sanitizeString($_POST['Email']);
    $Password = sanitizeString($_POST['Password']);
    
    if ($Email == "" || $Password == "")
        $error = "Not all fields were entered<br>";
    else
    {
      $result = queryMySQL("SELECT Email,Password FROM users
        WHERE Email='$Email' AND Password='$Password'");

      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Email/Password
                  invalid<br></span>";
      }
      else
      {
      //successful verification of Email and Password, store value into session variables
      //as long as current session remains active, these session variables will be 
      //acccessible by all programs in the project
        $_SESSION['Email'] = $Email;
        $_SESSION['Password'] = $Password;      
        die("<div class='alert alert-success'>".
          "You are now logged in. ".
            "</div><meta http-equiv='refresh' content='3; URL=index.php'>");
      }
    }
  }
*/
      
  echo <<<_END

<!DOCTYPE html>
<html>
<head>
  <title>Your Shoes - Sign In</title>
</head>
<body>
<br><br><br><br><br><br>
<div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-4 col-lg-offset-1">              
                <h1>S I G N &nbsp; I N</h1> 
                <br> 
                
              <label for="error" class="cols-sm-2 control-label" style="color:red;">$error</label>
           
                <form method='post' action='login.php'>        
                  <div class="form-group input-group">
                    <span class="input-group-addon">@</span>
                    <input type="Email" class="form-control" name='Email' value='$Email' id='Email' placeholder="Email address" required>
                  </div>
                  <div class="form-group input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                    <input type="Password" class="form-control" name='Password' value='$Password' id='Password' placeholder="Password" required>
                  </div>
                  <div class="form group"><button type="submit" class="btn btn-default" value='Login' style="width: 350px">Login</button>
                  </div> </form>
                  <br>
                  <a href="#"><label>Forgot Your Password?</label></a>              
            </div>
            <div class="col-lg-2">
                <center><img src="pictures/line.png"></center>
            </div>
            <div class="col-lg-4">              
                <h1>S I G N &nbsp; U P</h1> 
                <br><br>
                  <form action="Signup.php">                             
                  <div class="form group"><button type="submit" class="btn btn-primary" value='Login' style="width: 350px">Register</button>
                  </div></form>
            </div>
          </div>
        </div>    
_END
?>
<br><br><br><br><br><br><br>

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Shoes 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    </body>
</html>