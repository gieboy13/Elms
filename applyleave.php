<?php

include('includes/config.php');


    if(isset($_FILES['justice']['name']))
    {

        $empid=$_POST['eid'];
        $leavetype=$_POST['type'];
        $fromdate=$_POST['fromdate'];  
        $todate=$_POST['todate']; 
        $casesick=$_POST['casesick'];
        $casesickdesc=$_POST['casesickdesc'];
        $casevac=$_POST['casevac'];
        $casevacdesc=$_POST['casevacdesc'];
        $commutation=$_POST['commutation'];
        $desc=$_POST['desc'];
    
        $cpath="upload/";
        $ext = $_FILES['justice']['name'];
        $ext=pathinfo($ext, PATHINFO_EXTENSION);
        $tmp_name = $_FILES['justice']['tmp_name'];
        $justicename = $_FILES['justice']['name'];
        $target = "uploads/".$justicename;
        move_uploaded_file($_FILES['justice']['tmp_name'],  $target);
        
    }
    else if(!isset($_FILES['justice']['name']))
    {
        echo "walang nakalagay";
    }
    else{
        echo "nothing";
    }
    

    $status=0;
    $isread=0;
    if($fromdate > $todate)
    {
    $error=" ToDate should be greater than FromDate ";            
    }

    $sql="INSERT INTO tblleaves(justification,Description,LeaveType,FromDate,ToDate,Status,IsRead,empid,casesick,casesickdesc,casevac,casevacdesc,commutation)
                        VALUES(:justice,:desc,:leavetype,:fromdate,:todate,:status,:isread,:empid,:casesick,:casesickdesc,:casevac,:casevacdesc,:commutation)";
    
    $query = $dbh->prepare($sql);
    $query->bindParam(':leavetype',$leavetype,PDO::PARAM_STR);
    $query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
    $query->bindParam(':todate',$todate,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->bindParam(':isread',$isread,PDO::PARAM_STR);
    $query->bindParam(':empid',$empid,PDO::PARAM_STR);

    $query->bindParam(':desc',$desc,PDO::PARAM_STR);
    $query->bindParam(':justice',$justicename,PDO::PARAM_STR);

    $query->bindParam(':casesick',$casesick,PDO::PARAM_STR);
    $query->bindParam(':casesickdesc',$casesickdesc,PDO::PARAM_STR);
    $query->bindParam(':casevac',$casevac,PDO::PARAM_STR);
    $query->bindParam(':casevacdesc',$casevacdesc,PDO::PARAM_STR);
    $query->bindParam(':commutation',$commutation,PDO::PARAM_STR);

    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
        echo 'success';
    }
    else 
    {
        echo 'err';
    }

?>