<?php // functions.php
  $dbhost  = 'localhost';    	// localhost
  $dbname  = 'yourshoes';   	// Modify these... yourshoes
  $dbuser  = 'root';   			// xampp username = "root"
  $dbpass  = '';   				// xampp password =""
  $appname = "Your Shoes"; 	// name of your social networking site

  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if ($conn->connect_error) die($conn->connect_error);

  function createTable($name, $query) //check if table exist, if not, create new table
  {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
  }

  function queryMysql($query) //issues a query to MySQL, if fail -> show error message
  {
    global $conn;
    $result = $conn->query($query);
    if (!$result) die($conn->error);
    return $result;
  }

  function destroySession() //Destroy PHP sessions and clears its data to log users out
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }

  function sanitizeString($var) //Removes potentially malicious code or tags from user input
  {
    global $conn;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $conn->real_escape_string($var);
  }
/*
  function showProfile($user) //Display a user's image and "about me" message if the user has one
  {
    if (file_exists("$user.jpg"))
      echo "<img src='$user.jpg' style='float:left;'>";

    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if ($result->num_rows)
    {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
    }
  }
*/
?>
