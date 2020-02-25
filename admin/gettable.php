<?php
$q = intval($_GET['q']);

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

if ($q == 1){
	$sqlQuery = "select sum(est_price) as tsale,count(*) as tsold,date_finished from orders left join product on product.productid = orders.prodid left join size on size.sizeid = orders.sizeid left join papertype on papertype.typeid = orders.orderid left join customer on customer.userid = orders.customerid left join status on status.statuscode = orders.statuscode where orders.statuscode=4 group by date_finished order by date_finished ";
	$hq=mysqli_query($conn,"select sum(est_price) as total from orders left join product on product.productid = orders.prodid left join size on size.sizeid = orders.sizeid left join papertype on papertype.typeid = orders.orderid left join customer on customer.userid = orders.customerid left join status on status.statuscode = orders.statuscode where orders.statuscode=4 ");
	$hqrow = mysqli_fetch_array($hq);
	
	$result = mysqli_query($conn,$sqlQuery);

	echo "<table  width='100%' class='table table-striped table-bordered table-hover' id='salesTable'>
            <thead>
                <tr>
                    <th class='hidden'></th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>No. of On Leave</th>
                </tr>
            </thead>
            <tbody>";
	while($sqrow = mysqli_fetch_array($result)) {
	    echo "<tr>
                        <td class='hidden'></td>

                        <td>". date('M d, Y ',strtotime($sqrow['date_finished'])) . "</td>
                        <td align='left'>". $sqrow['tsold']. "</td>
                        <td align='right'>".number_format($sqrow['tsale'],2)."</td>

                    </tr>";
	}
	echo "<tr>
            <th class='hidden'></th>
           
            <th ></th>
            <td align='right'>TOTAL: </td>
            <td align='right'>". number_format($hqrow[0],2)."</td>
        </tr>
        </tbody></table>";
	mysqli_close($conn);
}
else if ($q == 2){
	$sqlQuery = "select sum(est_price) as tsale, count(*) as tsold, {fn MONTHNAME(date_finished)} as months,EXTRACT(YEAR FROM date_finished) as years from orders left join product on product.productid = orders.prodid left join size on size.sizeid = orders.sizeid left join papertype on papertype.typeid = orders.orderid left join customer on customer.userid = orders.customerid left join status on status.statuscode = orders.statuscode where orders.statuscode=4 group by months,years ORDER BY `years` desc,months  ";
	$hq=mysqli_query($conn,"select sum(est_price) as total from orders left join product on product.productid = orders.prodid left join size on size.sizeid = orders.sizeid left join papertype on papertype.typeid = orders.orderid left join customer on customer.userid = orders.customerid left join status on status.statuscode = orders.statuscode where orders.statuscode=4 ");
	$hqrow = mysqli_fetch_array($hq);
	
	$result = mysqli_query($conn,$sqlQuery);

	echo "<table  width='100%' class='table table-striped table-bordered table-hover' id='salesTable'>
            <thead>
                <tr>
                    <th class='hidden'></th>
                    <th>Sales Date</th>
                    <th>No. Of Jobs Done</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>";
	while($sqrow = mysqli_fetch_array($result)) {
	    echo "<tr>
                        <td class='hidden'></td>

                        <td>". $sqrow['months']." ". $sqrow['years'] . "</td>
                        <td align='left'>". $sqrow['tsold']. "</td>
                        <td align='right'>".number_format($sqrow['tsale'],2)."</td>

                    </tr>";
	}
	echo "<tr>
            <th class='hidden'></th>
           
            <th ></th>
            <td align='right'>TOTAL: </td>
            <td align='right'>". number_format($hqrow[0],2)."</td>
        </tr>
        </tbody></table>";
	mysqli_close($conn);
}
else if ($q == 3){
	$sqlQuery = "select sum(est_price) as tsale,count(*) as tsold, EXTRACT(YEAR FROM date_finished) as years from orders left join product on product.productid = orders.prodid left join size on size.sizeid = orders.sizeid left join papertype on papertype.typeid = orders.orderid left join customer on customer.userid = orders.customerid left join status on status.statuscode = orders.statuscode where orders.statuscode=4 group by years order by years ";
	$hq=mysqli_query($conn,"select sum(est_price) as total from orders left join product on product.productid = orders.prodid left join size on size.sizeid = orders.sizeid left join papertype on papertype.typeid = orders.orderid left join customer on customer.userid = orders.customerid left join status on status.statuscode = orders.statuscode where orders.statuscode=4 ");
	$hqrow = mysqli_fetch_array($hq);
	
	$result = mysqli_query($conn,$sqlQuery);

	echo "<table  width='100%' class='table table-striped table-bordered table-hover' id='salesTable'>
            <thead>
                <tr>
                    <th class='hidden'></th>
                    <th>Sales Date</th>
                    <th>No. Of Jobs Done</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>";
	while($sqrow = mysqli_fetch_array($result)) {
	    echo "<tr>
                        <td class='hidden'></td>

                        <td>". $sqrow['years'] . "</td>
                        <td align='left'>". $sqrow['tsold']. "</td>
                        <td align='right'>".number_format($sqrow['tsale'],2)."</td>

                    </tr>";
	}
	echo "<tr>
            <th class='hidden'></th>
           
            <th ></th>
            <td align='right'>TOTAL: </td>
            <td align='right'>". number_format($hqrow[0],2)."</td>
        </tr>
        </tbody></table>";
	mysqli_close($conn);
}
?>