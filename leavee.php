<?php
session_start();
error_reporting(1);

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
include('includes/config.php');


$leaveid = $_GET['id'];
$sql = "SELECT CONCAT(e.FirstName,' ',e.LastName) as FullName, e.Department as Department, e.Position as Position, s.salarygrade as Salary, l.LeaveType as LeaveType, CONCAT(MONTHNAME(l.PostingDate),' ',DAY(l.PostingDate),', ',YEAR(l.PostingDate)) as PostingDate, CONCAT(MONTHNAME(l.ToDate),' ',DAY(l.ToDate),', ',YEAR(l.ToDate)) as todate, CONCAT(MONTHNAME(l.FromDate),' ',DAY(l.FromDate),', ',YEAR(l.FromDate)) as fromdate, l.casesick as casesick, l.casesickdesc as sickdesc, l.casevac as casevac, l.casevacdesc as vacdesc, DATEDIFF(l.FromDate, l.ToDate) AS workingdays, l.commutation as commutation, c.sick_credits as sickc, c.vacation_credits as vacc 
		FROM tblleaves as l
		JOIN tblemployees as e
		on e.id = l.empid
		JOIN tblsalarygrade as s 
		on e.salary = s.salarygrade
		JOIN empcredits as c 
		on e.id = c.empid
		WHERE l.id = $leaveid";
$query = $dbh -> prepare($sql);

$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{   
 
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
			<label for="Department">1. Office/Department/College: <br><strong><?php echo htmlentities($result->Department);?></strong></label>

		</td>
		<td colspan="2">
			2. Name: <br>
 
    <strong><?php echo htmlentities($result->FullName);?></strong>

</td>
		</td>
	</tr>
	<tr>
		<td>
			3. Date of Filing <br>
			<strong><?php echo htmlentities($result->PostingDate);?></strong>
		</td>
		<td>
			4. Position <br>
			<strong><?php echo htmlentities($result->Position);?></strong>
		</td>
		<td>
			5. Salary <br>
		

              <strong>Grade: <?php echo htmlentities($result->Salary);?></strong>
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
			<strong><?php echo htmlentities($result->LeaveType);?></strong>
			<br><br>
			Inclusive Dates:
			<br>	<br>		

			From : <?php echo htmlentities($result->todate);?>
			<br>
			To : <?php echo htmlentities($result->fromdate);?>

			<br><br>

			Number of working days applied for: <?php echo htmlentities($result->workingdays);?>
		</td>
		<td colspan="3" style="width: 25px;">
			6.b Where Leave will be spent: <br>
			&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
			1) In case of vacation leave 
			<form>
			<?php 
			
			if(htmlentities($result->casevac) != "" && htmlentities($result->casevac) != "Abroad (Specify)")
			{
				echo "<input type='checkbox' checked>Within the Philippines<br>";
				echo "<input type='checkbox' >Abroad (Specify) <br>__________________";
			}
			else if(htmlentities($result->casevac) != "" && htmlentities($result->casevac) != "Within the Philippines")
			{
				echo "<input type='checkbox' >Within the Philippines<br>";
				echo "<input type='checkbox' checked>Abroad (Specify) <br> <u>".htmlentities($result->vacdesc)."   </u><br>";
			}
			else if(htmlentities($result->casevac) == "")
			{
				echo "<input type='checkbox' >Within the Philippines<br>";
				echo "<input type='checkbox' >Abroad (Specify) <br>__________________";
			}

				
			
			?>


			</form>
			&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
			2) In case of sick leave
			<form>

			<?php 
			
			if(htmlentities($result->casesick) != "" && htmlentities($result->casesick) != "In Hospital (Specify)")
			{
				echo "<input type='checkbox' checked>In Hospital (Specify) : <br> <u>".htmlentities($result->sickdesc)."</u><br>";
				echo "<input type='checkbox' >Out Patient (Specify) : <br>";
			}
			else if(htmlentities($result->casesick) != "" && htmlentities($result->casesick) != "Out Patient (Specify)")
			{
				echo "<input type='checkbox' checked>In Hospital (Specify) : <br> <u>".htmlentities($result->sickdesc)."</u><br>";
				echo "<input type='checkbox' >Out Patient (Specify) : <br>";
			}
			else if(htmlentities($result->casesick) == "")
			{
				echo "<input type='checkbox' >In Hospital (Specify) : <br>";
				echo "<input type='checkbox' >Out Patient (Specify) : <br>";
			}

			?>


			</form><br>
			6.d Commutation<br>
			<form>
			<?php 
			
			if(htmlentities($result->commutation) != "" && htmlentities($result->commutation) != "Not Requested")
			{
				echo "<input type='checkbox' checked>Requested  &nbsp;";
				echo "<input type='checkbox'>Not Requested <br>";
			}
			else if(htmlentities($result->commutation) != "" && htmlentities($result->commutation) != "Requested")
			{
				echo "<input type='checkbox'>Requested  &nbsp;";
				echo "<input type='checkbox' checked>Not Requested <br>";
			}
			

			?>
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
		
                            <br>As of <?php echo date("Y/m/d");?>
                            <strong></strong>
         <table style="color: black; border: 1px solid black; width: 100%;"  >
         <tr style="color: black;">
            <td style="border: 1px solid black; width: 100px;"><center>Vacation</center></td>
            <td style="border: 1px solid black; width: 100px;"><center>Sick</center></td>
            <td style="border: 1px solid black; width: 100px;"><center>Total</center></td>
            </tr>
        <tr style="color: black;">
            <td style="border: 1px solid black; width: 100px;"><strong><center><?php echo htmlentities($result->sickc);?></strong><br>Days</center></td>
            <td style="border: 1px solid black; width: 100px;"><strong><center><?php echo htmlentities($result->vacc);?></strong><br>Days</center></td>
            <td style="border: 1px solid black; width: 100px;"><strong><center><?php echo htmlentities($result->sickc)+htmlentities($result->vacc);?></strong><br>Days</center></td>
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

	
<?php 
} }
?>












</body>
</html>