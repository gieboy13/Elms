<?php
header('Content-Type: application/json');


$sqlQuery = "select count(*) as TotalOnLeave, NOW() as Today,
EXTRACT(DAY FROM FromDate) as week1,
EXTRACT(DAY FROM ToDate) as week2,
{fn MONTHNAME(FromDate)} as month1,
{fn MONTHNAME(ToDate)} as month2,
EXTRACT(YEAR FROM FromDate) as year1,
EXTRACT(YEAR FROM ToDate) as year2 
from tblleaves 
where Status=1 
group by FromDate, ToDate 
order by FromDate, ToDate";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>