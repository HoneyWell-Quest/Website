<?php
	
	include "init.php";

	if (isset($_POST["query"])) {
		$emp = $_POST["query"];
		echo $emp;
		$output ='';
		$query = "select * from Employee_Position where emp_name like '%".
		$emp ."%'";

		$result = mysqli_query($connection,$query);
		$output = '<ul class="list-unstyled">';
		if (mysqli_num_rows($result) > 0){

			while ($row = mysqli_fetch_array($result)){
					$output .= '<li>' .$row["emp_name"]. '<li>';
			}
		}
		else{
			$output .= '<li> Employee Not Found </li>';
		}
	}
	$output .='</ul>';

	echo $output;

?>