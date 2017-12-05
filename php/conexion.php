<?php

	function getConnection(){
	
		$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);
		if ($conn->connect_error) {
			die("Fallo en la conexion: " . $conn->connect_error);
		}
		return $conn;
	}

	function closeConnection($conn){
		$conn->close();
	}

?>