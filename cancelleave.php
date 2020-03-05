<?php 

$conn = mysqli_connect("localhost:8111","root","password","elms");

$leaveid = $_POST['del_id'];

if($leaveid > 0){

  // Check record exists
  $checkRecord = mysqli_query($conn,"SELECT * FROM tblleaves WHERE id=".$leaveid);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){

    $query = "UPDATE tblleaves SET Status= 3 WHERE id=".$leaveid;
    mysqli_query($conn,$query);
    echo "YES";
    exit;
  }
}

echo 0;
exit;