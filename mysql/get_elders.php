<?php
	$q = ($_GET['q']);

	$con = mysqli_connect('localhost','root','','employees');
	if (!$con) {
	    die('Could not connect: ' . mysqli_error($con));
	}

	$sql="SELECT *, DATEDIFF(to_date, from_date) AS tenure, first_name, last_name FROM dept_emp, employees WHERE `dept_emp`.emp_no = `employees`.emp_no ORDER BY tenure DESC LIMIT 10";
	$sql="SELECT *, DATEDIFF(to_date, from_date) AS tenure, `employees`.first_name, `employees`.last_name
	FROM dept_emp
	INNER JOIN employees ON `employees`.emp_no=`dept_emp`.emp_no AND `dept_emp`.dept_no='".$q."' ORDER BY tenure DESC LIMIT 10";
	$result = mysqli_query($con,$sql);

	if($con->error)
		echo $con->error;
	echo "<table>
	<tr>
	<th>Emp Id</th>
	<th>Emp Nmae</th>
	<th>Tenure</th>
	</tr>";
	while($row = mysqli_fetch_array($result)) {
	    echo "<tr>";
	    echo "<td>" . $row['emp_no'] . "</td>";
	    echo "<td>" . $row['first_name'].' '.$row['last_name'] . "</td>";
	    echo "<td>" . $row['tenure'] . "</td>";
	    echo "</tr>";
	}
	echo "</table>";
	mysqli_close($con);
?>