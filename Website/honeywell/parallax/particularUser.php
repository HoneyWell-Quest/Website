<?php
	
	include "init.php";

	$output ='';
if (isset($_POST["query"])) {
	$emp = $_POST["query"];
    if($emp != ''){
		     $query = "select * from Employee_Position where emp_name like '%".
		      $emp ."%'";

		       $result = mysqli_query($connection,$query) or die("Connection error: " . mysqli_connect_error());
		    $output = '';
		    if (mysqli_num_rows($result) > 0){
			     $row = mysqli_fetch_array($result);
			     $output = array(
			     			"name" => $row["emp_name"],
			     			"empid" => $row["emp_id"],
			     			"empposition" => $row["position_address"],
			     			"lastupdated" => $row["last_updated"]
			     			);
			     echo json_encode($output);
		    }
            else{
				 $output = trim('Not');
				 echo json_encode($output);
		    }
    }
}

?>		