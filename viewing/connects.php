<?php

function connect(){
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "food_restraunt";

	$link = mysqli_connect($server, $username, $password, $database);

	if(!$link){
		die("Could not connect".mysqli_connect_error());
	}
	//echo "Connected Successfully";

	return($link);
}

function insert($sql){
	$link = connect();
	if(mysqli_query($link, $sql)){
		echo "Record Successfully added";
	}
	else{
		echo "Could not connect ".mysqli_error($link);
	}
}

function getData($result){
	$link = connect();
	$rows = array();

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$rows[] = $row;
			//echo "<pre>";
		}
		/*for ($i=0; $i < mysqli_num_rows($result); $i++) { 
			$row = mysqli_fetch_assoc($result);
			$rows[] = $row;
		}*/
		return $rows;
	}
	else{
		//echo "No users found".mysqli_error($link);
	}
	//print_r($rows);
	//return $rows;
}

function getUpdate($sql){
	$link = connect();	

	if(mysqli_query($link, $sql)){
			echo "Record Successfully updated";
	}
	else{
		echo "Could not connect ".mysqli_error($link);
	}
}

function delete($sql){
	$link = connect();

	if(mysqli_query($link, $sql)){
			echo "Record Successfully updated";
	}
	else{
		echo "Could not connect ".mysqli_error($link);
	}
}

?>