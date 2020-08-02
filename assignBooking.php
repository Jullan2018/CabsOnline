<?php
//Name: Jullan Quevedo ID: 17981982
//This assignBooking php file updates the status column in the database from 
//unassigned to assigned, thus assigning a service to the customer.
include 'getConnection.php';
$userInput = file_get_contents('php://input');
$showRequest = "UPDATE CabsOnline SET Status = 'assigned' WHERE generatedCode = '$userInput'";

$result = mysqli_query($connection,$showRequest);
    // checks if the execution of the query was successful
     if(mysqli_num_rows($result) > 0)
        {
            echo "The booking Request $userInput has been properly assigned";
        }
        else
        {
            echo "Opps. There's been an error in the executing your query.<br><br>Please try again<br>";
        }
        mysqli_free_result($result);
        mysqli_close($connection);    
?>
