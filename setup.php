<!-- setup.php **calling up this file before any other files otherwise you will get SQL errors **however check that you have the database exist (in functions.php)-->

<!DOCTYPE html>
<html>
  <head>
    <title>Setting up database</title>
  </head>
  <body>

    <h3>Setting up...</h3>

<?php // setup.php 
  require_once 'functions.php';

  //call function createTable from functions.php
  createTable('users',
              'Status enum("ADMIN","USER") NOT NULL default "USER",
              Email VARCHAR(100) NOT NULL,
              Password VARCHAR(16) NOT NULL,
              FirstName VARCHAR(100) NOT NULL,
              LastName VARCHAR(100) NOT NULL,
              PhoneNumber VARCHAR(10) NOT NULL,
              Address VARCHAR(100) NOT NULL,
              City VARCHAR(100) NOT NULL,
              District VARCHAR(100) NOT NULL,
              PostCode VARCHAR(5) NOT NULL');

  createTable('products',
              'ProductID int(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
              ProductName VARCHAR(100) NOT NULL,
              Color VARCHAR(100) NOT NULL,
              Price double NOT NULL,
              Six int(3) NOT NULL,
              SixF int(3) NOT NULL,
              Seven int(3) NOT NULL,
              SevenF int(3) NOT NULL,
              Eight int(3) NOT NULL,
              EightF int(3) NOT NULL,
              Nine int(3) NOT NULL,
              Picture VARCHAR(100) NOT NULL');

  createTable('orders',
              'OrderID int(5) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
              Email VARCHAR(100) NOT NULL,
              ProductID int(4) NOT NULL,
              Size double NOT NULL,
              QtyBuy int(3) NOT NULL,
              Cash int(11) NOT NULL');

  createTable('bag',
              'ProductName VARCHAR(100) NOT NULL PRIMARY KEY,
              Picture VARCHAR(100) NOT NULL,
              Price double NOT NULL,
              Color VARCHAR(100) NOT NULL,
              Size double NOT NULL,
              QtyBuy int(3) NOT NULL,
              Total int(11) NOT NULL');

?>

    <br>...done.
  </body>
</html>
