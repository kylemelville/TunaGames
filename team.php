	<?php
		$pageSubTitle = 'Team';
		include('./includes/header.php');
		require("../mysqli_connect.php");
		$query = "SELECT first_name, last_name, description
			FROM employees;";
		$result = @mysqli_query($dbc, $query);
		if($result && $result->num_rows > 0) {
			$employeeList = '<ul id="employees">';
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$employeeList = $employeeList.'<li class="employee">
						<img src="./images/employee/1234.png" />
						<span class="name">'.$row['first_name'].' '.$row['last_name'].'</span>
						<p>
							'.$row['description'].'
						</p>
					</li>';
			}
			$employeeList = $employeeList.'</ul>';
			echo $employeeList;
		}
		include('./includes/footer.php'); 
	?>