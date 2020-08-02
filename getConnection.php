<?php
    //Name: Jullan Quevedo ID: 17981982
    //This php file is used to create a connection with the phpMyAdmin database.
    $host = "cmslamp14.aut.ac.nz";
    $username = "";
    $password = "";
    $db = "pkd2015";
      
    //Creates a connection to the server
    $connection = @mysqli_connect($host,$username,$password,$db);
    
    if (!$connection) {
		// Displays an error message
		echo "<p>Database connection failure</p>";
	} else 
    {
        
    }
?>