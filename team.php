<?php
	$pageSubTitle = 'Team';
	include('./includes/header.php');
	require("../mysqli_connect.php");
	$query = "SELECT first_name, last_name, description, profile_picture
		FROM employees;";
	$result = @mysqli_query($dbc, $query);
	if($result && $result->num_rows > 0) {
		$employeeList = '<ul id="employees">';
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$employeeList = $employeeList.'<div class="wrapper">
					<li class="employee">
						<img src=
							'.(is_null($row['profile_picture']) ?  './images/ui/missingprofileimage.png' : './images/employee/'.$row['profile_picture'].'').'
						/>					
						<div class="employee-details">
							<span class="name">'.$row['first_name'].' '.$row['last_name'].'</span>
							<p>
								'.$row['description'].'
							</p>
						</div>
					</li>
				</div>';
		}
		$employeeList = $employeeList.'</ul>';
		echo $employeeList;
	} else {
		echo '<div class="empty-list">
			<span>Nothing here!</span>
			<img src="./images/ui/sweatytuna.png" />
		</div>';
	}
	include('./includes/footer.php'); 
?>
<link rel="stylesheet" href="./css/team.css" type="text/css" />