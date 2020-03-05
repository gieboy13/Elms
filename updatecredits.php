<?php

$conn = mysqli_connect("localhost:8111","root","password","elms");

$sql = "UPDATE  empcredits
        SET     sick_credits = IF(month(date_reset) < month(now()), sick_credits + 1.25, sick_credits),
                vacation_credits = IF(month(date_reset) < month(now()), vacation_credits + 1.25, vacation_credits),
                date_reset = now()";


if ($conn->query($sql) === TRUE) {
    if( $conn->affected_rows == 0)
    {
        echo "No Affected";
    }
    else{
        echo "Update Success! ";
    }
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();







?>
