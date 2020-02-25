<?php
header('Content-Type: application/json');


$sqlQuery = "select count(*) as TotalOnLeave, NOW() as ThisYear,
EXTRACT(YEAR FROM FromDate) as year1,
EXTRACT(YEAR FROM ToDate) as year2 
from tblleaves 
where Status=1 
group by year1, year2 
order by year1, year2";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>