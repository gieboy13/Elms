<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost:8111","root","password","elms");

$sqlQuery = "SELECT count(*) as count, e.Department as department
FROM tblemployees as e 
JOIN tblleaves as l 
ON l.empid = e.id 
GROUP BY E.Department";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>