<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost:8111","root","password","elms");

$sqlQuery = "SELECT year(l.ToDate) as year, COUNT(*) as count
FROM tblleaves as l
WHERE STATUS = 1
GROUP BY year(l.ToDate)
";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>