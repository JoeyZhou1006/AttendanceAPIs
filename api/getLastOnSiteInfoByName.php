<?php
//including the file dboperation
require_once '../includes/DbOperation.php';

//creating a response array to store data
$response = array();

//creating a key in the response array to insert values
//this key will store an array iteself
$response['LastOnsiteData'] = array();


//creating object of class DbOperation so we can use the data query methods
$db = new DbOperation();

//get the name of the staff that we want to get the last onsite info from the request
$postVar = $_GET['Name'];

//get the last onsite information of the staff using the sql methods from DbOperation
$result = $db->getLastRecordOfStaff($postVar);

$temp = array();

//displaying the array in json format, and return the result to the app
echo $result;
?>
