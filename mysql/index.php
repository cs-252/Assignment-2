<!DOCTYPE html>
<html>
<head>
	<title>PHP SQL Demo</title>
	<style type="text/css">
		body > div {
			width: 70%;
			padding: 1em;
			margin: 1em auto;
			border: 1px solid black;
		}
	</style>
	<script type="text/javascript">
		function query(where, arg, res) {
			clear(res);
	        var xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function() {
	        	document.getElementById('query-'+res+'-response').innerHTML = "readyState: "+this.readyState;
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById('query-'+res+'-response').innerHTML = this.responseText;
	            }
	        };
	        if(arg) {
	        	let a = document.getElementById(arg).value;
	        	xmlhttp.open("GET", where+"?q="+a, true);
	        } else {
	        	xmlhttp.open("GET", where, true);
	        }
	        xmlhttp.send();
		}
		function clear(i) {
			console.log("Clearing "+i);
			document.getElementById('query-'+i+'-response').innerHTML = '';
		}
		function query1() {
			clear(1);
	        var xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById('query-1-response').innerHTML = this.responseText;
	            }
	        };
	        let empid = document.getElementById("empid").value;
	        let emplastname = document.getElementById("emplastname").value;
	        let empdepartment = document.getElementById("empdepartment").value;
	        xmlhttp.open("GET", "query1.php?empid="+empid+"&emplastname="+emplastname+"&empdepartment="+empdepartment, true);
	        xmlhttp.send();
		}
	</script>
</head>
<body>
	<div>
		<strong>Query-1</strong>
		<h1>Query by ID, LastName or Dept</h1>
		<div>
			Employee-Id: <input type="text" id="empid">
		</div>
		<div>
			Last name: <input type="text" id="emplastname">
		</div>
		<div>
			Department: <input type="text" id="empdepartment">
		</div>
		<button onclick="query1()">Run query</button>
		<div id="query-1-response"></div>
		<button onclick="clear(1)">Clear Response</button>
	</div>
	<div>
		<strong>Query-2</strong>
		<h1>Order departments by number of employees</h1>
		<div>
			 <button onclick="query('get_largest_departments.php', null,2)">Run query</button>
		</div>
		<div id="query-2-response"></div>
		<button onclick="clear(2)">Clear Response</button>
	</div>
	<div>
		<strong>Query-3</strong>
		<h1>Eldest people in depts</h1>
		<div>
			 Department-Id: <input type="text" id="deptid">
			 <button onclick="query('get_elders.php', 'deptid' ,3)">Run query</button>
		</div>
		<div id="query-3-response"></div>
		<button onclick="clear(3)">Clear Response</button>
	</div>
	<div>
		<strong>Query-4</strong>
		<h1>Gender ratio in depts</h1>
		<div>
			 Department-Id: <input type="text" id="deptid-4">
		</div>
		<div>
			 <button onclick="query('get_deptwise_genderratio.php', 'deptid-4', 4)">Run query</button>
		</div>
		<div id="query-4-response"></div>
		<button onclick="clear(4)">Clear Response</button>
	</div>
	<div>
		<strong>Query-5</strong>
		<h1>Gender pay ratio in depts</h1>
		<div>
			 Department-Id: <input type="text" id="deptid-5">
		</div>
		<div>
			 <button onclick="query('get_deptwise_payratio.php', 'deptid-5' ,5)">Run query</button>
		</div>
		<div id="query-5-response"></div>
		<button onclick="clear(5)">Clear Response</button>
	</div>
</body>
</html>