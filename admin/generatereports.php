<?php

header('Content-Type: application/json');

$conn = mysqli_connect("localhost:8111","root","password","elms");


$stats = $_POST['status'];
$d = $_POST['dep'];
$l = $_POST['lev'];
$td =$_POST['start'];
$fd = $_POST['end'];

$sql = "SELECT concat(e.FirstName,' ',e.LastName) as name, e.Department as dept, l.LeaveType as leaves , l.ToDate as todate, l.FromDate as fromdate
        FROM tblleaves as l 
        JOIN tblemployees as e
        ON l.empid = e.id
        WHERE e.Department LIKE '{$d}' 
        AND l.LeaveType LIKE '{$l}'
        AND l.ToDate BETWEEN '{$td}' AND '{$fd}'
        AND l.status LIKE '{$stats}'";


$result = mysqli_query($conn,$sql);
$output = '';
$output .= '<table id="reportTable" class="display nowrap" style="width:100%">
                <thead>
                <tr>  
                  <th>Name</th>
                  <th>Department</th>
                  <th>Type</th>
                  <th>Leave : To</th>
                  <th>Leave : From</th>
                </tr>
                </thead>
                <tbody>';

while ($row = $result->fetch_assoc()) {

$output .= '<tr>
                <td>'.$row['name'].'</td>
                <td>'.$row['dept'].'</td>
                <td>'.$row['leaves'].'</td>
                <td>'.$row['todate'].'</td>
                <td>'.$row['fromdate'].'</td>
            </tr> ';
}
$output .= ' </tbody>                             
        </table>';
        
mysqli_close($conn);

echo json_encode($output);





?>