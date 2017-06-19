<!DOCTYPE html>
  <html>
  <head>
    <title>Your Shoes - Sign Up</title>
  </head>
  <body>
  <br><br><br><br><br>

<?php //signup.php //Module to enable users to join the new network
  require_once 'header.php';

  $error = $Email = $Password = $FirstName = $LastName = $PhoneNumber = $Address = $City = $District = $PostCode = "";

  if (isset($_SESSION['Email'])) destroySession();

  if (isset($_POST['Email']))
  {
    $Email = sanitizeString($_POST['Email']);
    $Password = sanitizeString($_POST['Password']); //in fact should Salt the Password before storing **
    $conPassword = sanitizeString($_POST['conPassword']);
    $FirstName = sanitizeString($_POST['FirstName']);
    $LastName = sanitizeString($_POST['LastName']);
    $PhoneNumber = sanitizeString($_POST['PhoneNumber']);
    $Address = sanitizeString($_POST['Address']);
    $City = sanitizeString($_POST['City']);
    $District = sanitizeString($_POST['District']);
    $PostCode = sanitizeString($_POST['PostCode']);


    if ($Email == "" || $Password == "") {
      $error = "Not all fields were entered<br><br>";
    }
    else
    {
      $result = queryMysql("SELECT * FROM users WHERE Email='$Email'");

      if ($result->num_rows) {
        $error = "That Email already exists<br><br>";
      }
      else if ($Password != $conPassword) {
        $error = "Password do not match";
      }
      else
      {
        queryMysql("INSERT INTO users (Email,Password,FirstName,LastName,PhoneNumber,Address,City,District,PostCode) VALUES('$Email', '$Password', '$FirstName', '$LastName', '$PhoneNumber', '$Address', '$City', '$District', '$PostCode')");
        die("<div class='alert alert-success'>".
          "Register success. ".
            "</div><meta http-equiv='refresh' content='3; URL=login.php'>");
      }
    }
  }

  echo <<<_END
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1>R E G I S T E R</h1>
          <form method='post' action='signup.php'>
            <div class="col-lg-5">              
                <br><label for="error" class="cols-sm-2 control-label" style="color:red">$error</label>
                <br>              
                  <div class="form-group col-lg-6">                  
                    <label>First Name</label>                    
                    <input class="form-control" type="text" name='FirstName' id='FirstName' required>
                  </div>                  
                  <div class="form-group col-lg-6">
                    <label>Last Name</label>                    
                    <input class="form-control" type="text" name='LastName' id='LastName' required>
                  </div>
                  <div class="form-group col-lg-6">                  
                    <label>E-mail Address</label>                    
                    <input class="form-control" type="Email" name='Email' id='Email' required>
                  </div>                  
                  <div class="form-group col-lg-6">
                    <label>Phone Number</label>                    
                    <input class="form-control" type="text" name='PhoneNumber' id='PhoneNumber' minlength="9" maxlength="10" required>
                  </div>

                  <div class="form-group">                  
                    <label>Password</label>                    
                    <input class="form-control" type="Password" name='Password' id='Password' minlength="4" maxlength="20" placeholder="4 - 20 characters" required>
                  </div> 
                  <div class="form-group">                  
                    <label>Confirm Password</label>                    
                    <input class="form-control" type="Password" name='conPassword' id='conPassword' minlength="4" maxlength="20" placeholder="4 - 20 characters" required>
                  </div> 
            </div>   
            <div class="col-lg-2">
                <center><img src="pictures/line.png"></center>
            </div>
            <div class="col-lg-5">              
                <br><br>                                               
                  <div class="form-group">                  
                    <label>Adress</label>                    
                    <input class="form-control" type="text" name='Address' id='Address' required>
                  </div> 
                  <div class="form-group">                  
                    <label>City</label>                    
                    <input class="form-control" type="text" name='City' id='City' required>
                  </div>
                  <div class="form-group">                  
                    <label>District</label>                    
                    <input class="form-control" type="text" name='District' id='District' required>
                  </div> 
                  <div class="form-group">                  
                    <label>Post Code</label>                    
                    <input class="form-control" type="text" name='PostCode' id='PostCode' minlength="5" maxlength="5" required>
                  </div>
            </div>   
            <div class="form group col-lg-12">           
              <center><button type="submit" class="btn btn-primary" name="Regis" style="width: 30%; margin-top: 40px;">
                Submit</button></center>
            </div>      
          </form>           
        </div>
      </div>
    </div>    
_END;
?>

<br><br><br>

        <center><hr style="width:85%;"></center>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <p>Copyright &copy; Your Shoes 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    </body>
</html>