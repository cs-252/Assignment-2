<?php
	$con = mysqli_connect('localhost','root','','employees');
	if (!$con) {
	    die('Could not connect: ' . mysqli_error($con));
	}

	$sql="SELECT *, COUNT(dept_no) AS population FROM dept_emp GROUP BY dept_no ORDER BY population DESC";
	$result = mysqli_query($con,$sql);

	echo "<table>
	<tr>
	<th>Dept Num</th>
	<th>Populatin</th>
	</tr>";
	while($row = mysqli_fetch_array($result)) {
	    echo "<tr>";
	    echo "<td>" . $row['dept_no'] . "</td>";
	    echo "<td>" . $row['population'] . "</td>";
	    echo "</tr>";
	}
	echo "</table>";
	mysqli_close($con);
?>