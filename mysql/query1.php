<?php
	$empid = ($_GET['empid']);
	$emplastname = ($_GET['emplastname']);
	$empdepartment = ($_GET['empdepartment']);

	$con = mysqli_connect('localhost','root','','employees');
	if (!$con) {
	    die('Could not connect: ' . mysqli_error($con));
	}

	$sql=
	"SELECT first_name, last_name, `employees`.emp_no, `dept_emp`.emp_no, dept_no, birth_date from employees, dept_emp WHERE `employees`.emp_no = `dept_emp`.emp_no";
	if($empid) {
		$sql = $sql." AND `employees`.emp_no=".$empid;
	}
	if($emplastname) {
		$sql = $sql." AND `employees`.last_name LIKE \"%".$emplastname."%\"";
	}
	if(($empdepartment)) {
		$sql = $sql." AND `dept_emp`.dept_no=\"".$empdepartment."\"";
	}
	$sql = $sql." order by `employees`.emp_no asc limit 20;";
	$result = mysqli_query($con,$sql);
	if($con->error) {
		echo $con->error;
	} else {
		echo "<table>
		<tr>
		<th>Emp Id</th>
		<th>First name</th>
		<th>Lastname</th>
		<th>Gender</th>
		<th>Birthdate</th>
		</tr>";
		while($row = mysqli_fetch_array($result)) {
		    echo "<tr>";
		    echo "<td>" . $row['emp_no'] . "</td>";
		    echo "<td>" . $row['first_name'] . "</td>";
		    echo "<td>" . $row['last_name'] . "</td>";
		    echo "<td>" . $row['dept_no'] . "</td>";
		    echo "<td>" . $row['birth_date'] . "</td>";
		    echo "</tr>";
		}
		echo "</table>";
	}

	mysqli_close($con);
?>