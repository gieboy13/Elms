<?php
session_start();
error_reporting(0);

    ?>
    <!DOCTYPE html>
<html>
<head>
	<title>Employee | APPLICATION FORM</title>
	<title></title>

	<style type="text/css">
		table, th, td {
			color: black; 
			background-color: 
			transparent; border: gray 2px solid;


			}
	</style>
</head>
<body>
<?php
include('conn2.php');
$leaveid = $_GET['id'];
    $query=mysqli_query($conn2,"select * from tblleaves l 
                                join tblemployees e 
                                on e.id = l.empid join empcredits c on c.empid = e.id 
                               
                            where l.id = $leaveid");

 $rowl = mysqli_fetch_array($query);
 $emid = $rowl['empid'];
 
?>

<table>
	<tr>
		<td colspan="2"><center>APPLICATION FOR LEAVE <br> Polytechnic University of the Philippines <br> Sta. Mesa, Manila</center></td>
		<td>
			CS Form No. 6 Revised 1981
		</td>
	</tr>
	<tr>
		<td colspan="">
			<label for="Department">1. Office/Department/College: <br><strong><?php echo $rowl['Department']; ?></strong></label>

		</td>
		<td colspan="2">
			2. Name: <br>
 
    <strong><?php echo $rowl['LastName']; ?>
    <?php echo $rowl['FirstName']; ?> 
    <?php echo $rowl['MiddleName']; ?></strong>



</td>
		</td>
	</tr>
	<tr>
		<td>
			3. Date of Filing <br>
			<strong><?php echo $rowl['PostingDate']; ?>
			<?php echo htmlentities($result->PostingDate);?></strong>
		</td>
		<td>
			4. Position <br>
			<strong><?php echo $rowl['Position']; ?></strong>
		</td>
		<td>
			5. Salary <br>
			<?php  
 $query2=mysqli_query($conn2,"select *  from tblemployees e 
                                join tblsalarygrade s on s.salarygrade = e.salary
                            where e.id = $emid"); $rowl2 = mysqli_fetch_array($query2);?>

              <strong><?php echo $rowl2['salary'];?></strong>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<center>6. DETAILS OF APPLICATION</center>
		</td>	
	</tr>
	<tr>
		<td style="width: 375px;">
			6.a Type of Leave: 
			<strong><?php echo $rowl['LeaveType'].'</strong>'; 


echo "<pre>";
$startDate = $rowl['FromDate'];
$endDate = $rowl['ToDate'];

$startDatetime = new DateTime("$startDate 00:00:00");

$endDatetime = new DateTime("$endDate 00:00:00");

$datetimeCounter = $startDatetime;
$allDateCounter = 0;
$weekendCounter = 0;
print_r('Inclusive Dates: <br><strong>');
print_r($startDatetime->format('M/d/Y-D') . " to ");
print_r($endDatetime->format('M/d/Y-D')."</br></strong>");
while($datetimeCounter->format('M/d/Y-D') <= $endDatetime->format('M/d/Y-D')){
    
    $allDateCounter++;
   print_r($datetimeCounter->format('m-d-Y-D') . "<br/>");

    if($datetimeCounter->format('w') == 0 || $datetimeCounter->format('w') == 6){
        $weekendCounter++;
    }

    $datetimeCounter->modify('+1 day'); // increment ng date
}

$inclusiveDateCounter = $allDateCounter - $weekendCounter;
print_r('Number of Working Days Applied For: <strong>');
print_r($inclusiveDateCounter.'<strong>');?>
		</td>
		<td colspan="3" style="width: 25px;">
			6.b Where Leave will be spent: <br>
			&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
			1) In case of vacation leave 
			<form>
				<input type="checkbox" name="ph">Within the Philippines<br>
				<input type="checkbox" name="ab">Aborad (Specify __________________<br>______________________________________<br>	
			</form>
			&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
			2) In case of sick leave
			<form>
				<input type="checkbox" name="hosp">In Hospital (Specify __________________<br>______________________________________
				<input type="checkbox" name="op">Out Patient (Specify __________________<br>______________________________________
			</form><br>
			6.d Commutation<br>
			<form>
				<input type="checkbox" name="req">Requested
				&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
				<input type="checkbox" name="notreq">Not Requested
			</form><br>
			<center>__________________________________</center>
			
			<center>Signature of Applicant</center>

		</td>
	</tr>
	<tr>
		<td colspan="3">
			<center>7. DETAILS OF ACTION ON APPLICATION</center>
		</td>
	</tr>
	<tr>
		<td>
			7.a Certificate of Leave Credits: 
			<?php $query3=mysqli_query($conn2,"select NOW() as datetoday  from tblemployees e 
                                join tblsalarygrade s on s.salarygrade = e.salary
                            where e.id = $emid"); $rowl3 = mysqli_fetch_array($query3)?>
                            <br>As of 
                            <strong><?php echo $rowl3['datetoday']; ?></strong>
         <table style="color: black; border: 1px solid black; width: 100%;"  >
         <tr style="color: black;">
            <td style="border: 1px solid black; width: 100px;"><center>Vacation</center></td>
            <td style="border: 1px solid black; width: 100px;"><center>Sick</center></td>
            <td style="border: 1px solid black; width: 100px;"><center>Total</center></td>
            </tr>
        <tr style="color: black;">
            <td style="border: 1px solid black; width: 100px;"><strong><center><?php echo $rowl['sick_credits']; ?></strong><br>Days</center></td>
            <td style="border: 1px solid black; width: 100px;"><strong><center><?php echo $rowl['vacation_credits']; ?></strong><br>Days</center></td>
            <td style="border: 1px solid black; width: 100px;"><strong><center><?php echo ($rowl['vacation_credits'])+($rowl['sick_credits']); ?></strong><br>Days</center></td>
        </tr>
             </table>
            <br><br><br>
			<center>__________________________________</center>
			<center>Signature of Applicant</center>
    
		
		<td colspan="3">
			7.b Recommendation <br><br><br>
			<form>
				<input type="checkbox" name="Approval">Approval<br>
				<input type="checkbox" name="Approval">Disapproval to __________________<br>_________________
			</form><br><br><br>
			<center>__________________________________</center>
			<center>Authorized Official</center>
		</td>
	</tr>
	<tr>
		<td colspan="3">
			7.c Approval for: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.d Disapproval for:<br>
			____________ Days with pay
			;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________________________<br>
			____________ Days without pay
			
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________________________<br>
			____________ Others (Specify) 
			<br><br>
			<center>______________________________</center><br><center>Signature</center><br><center>______________________________</center><center>Authorized Official</center>
			Date: ___________________
			
		</td>
	</tr>











</body>
</html>