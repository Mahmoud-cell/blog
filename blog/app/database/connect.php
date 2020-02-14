<?php  
$host = 'localhost'; //this localhost where database is on it 
$user = 'root'; // the name of the user is called root
$pass = ''; //
$db_name = 'blog'; //the database we created in the phpmyadmin

//new instance of connection and take these parameters
// new MYSQLi(); object oriented interface
$conn = new MYSQLi($host, $user, $pass, $db_name);

//handle connection error
if($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error); 
} else {
	echo "DB successful connection";
}

?>