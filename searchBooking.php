<?php
//Name: Jullan Quevedo ID: 17981982
//This searchBooking php file display all the booking request that 
// fit the condition of the SQL query.
include 'getConnection.php';

$showRequest = "SELECT * FROM CabsOnline WHERE Status = 'unassigned' AND
pickUpDateTime >= DATE_SUB(NOW(), INTERVAL 2 HOUR)";

$result = mysqli_query($connection,$showRequest);

    // checks if the execution of the query was successful
     if(mysqli_num_rows($result) > 0)
        {
            echo "<table>
            <tr>
            <th>Generated Code</th>
            <th>fullName</th>
            <th>Phone No</th>
            <th>Pick Up Address</th>
            <th>Booking Date</th>
            <th>Booking Time</th>
            <th>Status</th>
            </tr>";
         
            while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['generatedCode'] . "</td>";
                echo "<td>" . $row['fullName'] . "</td>";
                echo "<td>" . $row['phoneNo'] . "</td>";
                echo "<td>" . $row['pickUpAddress'] . "</td>";
                echo "<td>" . $row['bookingDate'] . "</td>";
                echo "<td>" . $row['bookingTime'] . "</td>";
                echo "<td>" . $row['Status'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "No records has been found!<br>";
        }
        mysqli_free_result($result);
        mysqli_close($connection);    
?>
