<?php
	$q = intval($_GET['q']);

	$con = mysqli_connect('localhost','root','','employees');
	if (!$con) {
	    die('Could not connect: ' . mysqli_error($con));
	}

	$sql="SELECT * FROM employees WHERE emp_no = ".$q." limit 1";
	$result = mysqli_query($con,$sql);

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
	    echo "<td>" . $row['gender'] . "</td>";
	    echo "<td>" . $row['birth_date'] . "</td>";
	    echo "</tr>";
	}
	echo "</table>";
	mysqli_close($con);
?>