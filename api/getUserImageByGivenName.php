<?php
//including file dboperation
require_once '../includes/DbOperation.php';

//creating a response array to store data
$response = array();



$response['users'] = array();
//creating object of class dboperation
$db = new DbOperation();

//create an array of staff's names, should later be replaced by the post data from ios
$staff=array("Jennifer Wu","Kenny Chau","Li Wang","Nevi Pitt","Ren Tharakan");

//a for loop to go through the array
foreach ($staff as $value) {
	echo "$value";
	//then for each staff, we need to query the table to get the image data

}

//getting the image by given name

//get app post data which should be an arrays of all staff names



?>