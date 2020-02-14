<?php 

//cause i want the function in that file
require('connect.php');

//var_dump($users); //here display the database with bad shape
// this function only for development not in my source 
function dd($value)
{
	echo "<pre>", print_r($value, true), "</pre>";                 // print_r create 1 that mean true so i will fix it by adding true
	die(); 														// stop its job after execution
}



/*this function is for brief purpose 
  data here refers to $conditions*/
function executeQuery($sql, $data) 
{
	global $conn;
	$stmt = $conn->prepare($sql); 		  						//ready to connection 
	$values = array_values($data);						// record values of cond into values variables ||get values
	$types = str_repeat('s', count($values));					// s here mean the string values of cond || get types 
	$stmt->bind_param($types, ...$values);					   //...this mean $dmin, $values, but i ts in high php version 
	$stmt->execute();
	return $stmt;
}



/*in $condition if empty=> mean no condtions that in line no 43 => nothing to show just ready connection
  in $condition if not empty=> there is a loop to change the database by the admin and $key=$value mean that admin=1
*/
function selectAll($table, $conditions = [])
{
	global $conn; 												//cause every function could use it 
	$sql = "SELECT * FROM $table"; 		  					 	// here we select all from users table

	if (empty($conditions)) {
	$stmt = $conn->prepare($sql); 		  						//ready to connection 
	$stmt->execute();
	$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 	//fetch it and save it 
	return $records;
	} else {
		//return recorda that match the conditions
		// $sql = " SELECT * FROM $table WHERE username='Awa' AND admin='1';
		//forming a query
		$i = 0;
		foreach ($conditions as $key => $value) {
			if ($i === 0) {
				$sql = $sql . " WHERE $key=?"; // ? to prevent sql injqtion #1 up we use bind parameter here
			} else {
				$sql = $sql . " AND $key=?";   // #1

			}
			$i++;

		}



		$stmt = executeQuery($sql, $conditions); 					 						//executes the data inserted
		$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 	//fetch it and save it 
		return $records; 
	}

}



// selectOne is function to display one row
function selectOne($table, $conditions)
{
	global $conn; 												//cause every function could use it 
	$sql = "SELECT * FROM $table"; 		  					 	// here we select all from users table
	//return recorda that match the conditions
	// $sql = " SELECT * FROM $table WHERE username='Awa' AND admin='1';
	$i = 0;
	foreach ($conditions as $key => $value) {
		if ($i === 0) {
			$sql = $sql . " WHERE $key=?";
		} else {
			$sql = $sql . " AND $key=?";
		}
		$i++;

	}


	$sql = $sql . " LIMIT 1";
	$stmt = executeQuery($sql, $conditions); 		 //executes the data inserted
	$records = $stmt->get_result()->fetch_assoc(); 	//fetch only one row to dispaly it and save it 
	return $records; 
}



function create($table, $data)
{
	global $conn;
    // $sql = "INSERT INTO users SET username=?, admin=?, email=?, password=?"
	$sql = "INSERT INTO users SET ";

	$i = 0;
	foreach ($data as $key => $value) {
		if ($i === 0) {
			$sql = $sql . " $key=?"; 
		} else {
			$sql = $sql . ", $key=?";   

		}
		$i++;

	}
	$stmt = executeQuery($sql, $data);
	$id = $stmt->insert_id;
	return $id;
}



function update($table, $id, $data)
{
	global $conn;
    // $sql = "UPDATE users SET username=?, admin=?, email=?, password=? WHERE id=?"
	$sql = "UPDATE $table SET ";

	$i = 0;
	foreach ($data as $key => $value) {
		if ($i === 0) {
			$sql = $sql . " $key=?";
		} else {
			$sql = $sql . ", $key=?";

		}
		$i++;

	}

	$sql = $sql . " WHERE id=?";
	$data['id'] = $id; 
	$stmt = executeQuery($sql, $data);
	return $stmt->affected_rows;
}



function delete($table, $id)
{
	global $conn;
     $sql = "DELETE FROM $table WHERE id=?";

	$stmt = executeQuery($sql, ['id' => $id]);
	return $stmt->affected_rows;
}



/*this code is pathed for create function that take second parameter $data so the error was i don`t specify the the data*/
/*
$data = [
	 'username'=>'Melvinee',
	 'admin'=>1,
	 'email'=>'melvine@melvine.com',
	 'password'=>'melvine'
];
// just for testing
	$id = create('users', $data);
	dd($id);	
*/