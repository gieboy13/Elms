<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost:8111","root","password","elms");

$sqlQuery = "SELECT MONTHNAME(l.ToDate) as month, COUNT(*) as count
FROM tblleaves as l
WHERE year(l.ToDate) = year(now()) AND status = 1
GROUP BY MONTHNAME(l.ToDate)";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>