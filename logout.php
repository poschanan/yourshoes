<?php // logout.php
  require_once 'header.php';

  if (isset($_SESSION['Email']))
  {
    destroySession();
    echo "<div class='main alert alert-success'><br><br>You have been logged out." .
         "</div><meta http-equiv='refresh' content='3; URL=index.php'>";
  }
  else 
    echo "<div class='main'><br>" .
            "You cannot log out because you are not logged in";
?>

    <br><br></div>
  </body>
</html>
