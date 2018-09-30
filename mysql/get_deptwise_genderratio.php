<?php
	$con = mysqli_connect('localhost','root','','employees');
	if (!$con) {
	    die('Could not connect: ' . mysqli_error($con));
	}

	// $sql="SELECT SUM(`salaries`.salary) as ssm,`employees`.gender FROM salaries
	// INNER JOIN employees ON `salaries`.emp_no=`employees`.emp_no GROUP BY gender ORDER BY ssm DESC";
	// $sql=
	// 	"SELECT `a`.emp_no, `b`.salary, `a`.last_name, `a`.first_name, `a`.gender
	// 	FROM employees `a`
	// 	INNER JOIN (
	// 	    SELECT `employees`.emp_no, MAX(salary) as salary
	// 	    FROM employees, salaries
	// 	    WHERE `employees`.emp_no = `salaries`.emp_no
	// 	    GROUP BY emp_no
	// 	) `b` ON `a`.emp_no = `b`.emp_no";

	$sql="SELECT count(gender) as pop, gender from (select gender, dept_no from employees, dept_emp where `dept_emp`.dept_no=\"".$_GET['q']."\" and `employees`.emp_no=`dept_emp`.emp_no) a GROUP BY gender;";
	$result = mysqli_query($con,$sql);
	echo $con->error;
	$m = -1;
	$f = -1;
	echo "<table>
	<tr>
	<th>gender</th>
	<th>pop</th>
	</tr>";
	while($row = mysqli_fetch_array($result)) {
		if($m==-1) {
			$m = $row['pop'];
		} else {
			$f = $row['pop'];
		}
	    echo "<tr>";
	    echo "<td>" . $row['gender'] . "</td>";
	    echo "<td>" . $row['pop'] . "</td>";
	    echo "</tr>";
	}
	echo "</table>";
	echo "Gender ratio: ".($m/$f);
	mysqli_close($con);
?>