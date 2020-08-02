<?php
    //Name:Jullan Quevedo ID: 17981982
    //This is php file that contains the information regarding on connecting
    //to the database.
    include 'getConnection.php';
    //This creates a database if the database doesn't exist.
    $SQLCREATEDATABASE = "CREATE DATABASE IF NOT EXISTS CabsOnline";
    if(!mysqli_select_db($connection,$SQLCREATEDATABASE))
    {
        mysqli_query($connection,$SQLCREATEDATABASE);
    }
    //This creates a table in the database for db.
    $SQLCREATETABLE = "CREATE TABLE IF NOT EXISTS CabsOnline(
        generatedCode VARCHAR(10) PRIMARY KEY,
        fullName VARCHAR(50) NOT NULL,
        phoneNo VARCHAR(10) NOT NULL,
        pickUpAddress VARCHAR(100) NOT NULL,
        bookingDate DATE NOT NULL,
        bookingTime TIME NOT NULL
        Status VARCHAR(100) NOT NULL
        pickUpDateTime DATETIME NOT NULL)";
    
    if(!mysqli_select_db($connection,$SQLCREATETABLE))
    {
        mysqli_query($connection,$SQLCREATETABLE);
    }
    //Close a connection to the server
    mysqli_close($connection);   
?>
    
<?php
header('Content-type: application/json');
$json = file_get_contents('php://input');
$data = json_decode($json); 
$name = $data->name; 
$contactno = $data->contactno;
$pickup = $data->pickup;
$bookingDate = $data->bookingDate;
$bookingTime = $data->bookingTime;
$generateCode = uniqid();
$pickupDateTime = new DateTime("$bookingDate $bookingTime");
$pickupDateTime->add(new DateInterval('PT'. 15 . 'M'));
$datetime = $pickupDateTime->format('Y-m-d H:i:s');

$status = "unassigned";
include 'getConnection.php';
//SQL query that add the data in the database.
$saveData = "INSERT INTO CabsOnline(generatedCode,fullName,phoneNo,pickUpAddress,bookingDate,bookingTime,Status,pickUpDateTime)
        VALUES('$generateCode','$name','$contactno','$pickup','$bookingDate','$bookingTime','$status', '$datetime')";

$result = mysqli_query($connection,$saveData);
    // checks if the execution of the query was successful
    if(!$result) 
    {
        mysqli_close($connection);  
        echo "<p>Opps.There was an error in executing the query. </p>";
    } 
    else
    {
        mysqli_close($connection);  
        echo "<br>Thank you!Your booking reference is $generateCode.Your pickUp Date Time is: $datetime";
    }
     
?>