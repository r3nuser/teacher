<?php

function openConnection(){
	try {
		$con = new mysqli("localhost","root","root","teachercontrol");
		mysqli_query($con,"SET NAMES 'utf8'");
		return $con;
	} catch (Exception $e){
		echo $e->getMessage();
		return null;
	}
}

function closeConnection($con) {
	try{
		mysqli_close($con);
	}catch(Exception $e){
		echo $e->getMessage();
	}
}

?>
