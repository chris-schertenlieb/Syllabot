<?php

	
	if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
		die();
	} 
	
	include_once("config.php");
        session_start();
	global $db_connection;
	$course_id       = $_SESSION['course_id'];
	$course_name     = $_SESSION['course_name'];
   	$course_time     = $_POST['time'];
   	$course_location = $_POST['location'];
   	$office_location = $_POST['office'];
	$_SESSION['time'] = $_POST['time'];
	$_SESSION['location'] = $_POST['location'];

        $query = <<<SQL
	    SELECT * 
	    FROM temp_table
	    WHERE course_id = '{$course_id}'
	  
SQL;

	$result = mysqli_query($db_connection, $query);
	if (mysqli_num_rows($result) ==  0){

   	   $query = <<<SQL
	
		INSERT INTO temp_table (course_id, course_time, course_location, office, course_name)
		VALUES ('{$course_id}', '{$course_time}', '{$course_location}', '{$office_location}', '{$course_name}')

SQL;
}	else {
	    $query = <<<SQL
		UPDATE temp_table
		SET course_time = '{$course_time}', course_location = '{$course_location}', office = '{$office_location}'
		WHERE course_id = '{$course_id}'
SQL;
	}

    mysqli_query($db_connection, $query);

    header('Location: instructor.php?processed=true');

?>
