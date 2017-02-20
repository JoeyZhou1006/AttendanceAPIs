<?php

//connect to the ieducate staff attendance database
$link = mysqli_connect("localhost", "root", "", "ieducate_Attendance");

// Check connection, if not connected, stop executing, and show the detail of the error
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



//get the data from the posted request
$entityBody = file_get_contents('php://input');

//decode the json data into array
$decoded = json_decode($entityBody, TRUE);

//using error_log method to check whether the data is successfully posted and retrieved
error_log($imageString = $decoded["TableName"]);
error_log($imageString = $decoded["Date"]);
error_log($imageString = $decoded["Time"]);
error_log($imageString = $decoded["Onsite"]);
error_log($imageString = $decoded["signatureURL"]);

//save the posted data into variable
$tableName = $decoded["TableName"];
$Date = $decoded["Date"];
$Time = $decoded["Time"];
$Onsite = $decoded["Onsite"];
$signatureURL = $decoded["signatureURL"];


// construct the insert query string
$sql = "INSERT INTO `$tableName` (Date, Time, OnSite, Sign) VALUES ('$Date', '$Time', '$Onsite', '$signatureURL')";


//Initialize an array object for constructing the response
$response = array();

//execute the query and if the record is added successfully,create true as the response
if(mysqli_query($link, $sql)){
   
    error_log("Records added successfully");
    $response['success'] = 'true';

} else{
   // echo "ERROR: Could not able to execute $sql. ";
    //if it is not inserted properly, log the error for investigation
    error_log(mysqli_error($link));
    //construct the response as false 
    $response['success'] = 'false';
}
 
// Close connection
mysqli_close($link);


//encode the response into json format
echo json_encode($response);

?>
