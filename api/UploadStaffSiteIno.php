<?php


$link = mysqli_connect("localhost", "root", "", "ieducate_Attendance");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}




$entityBody = file_get_contents('php://input');

$decoded = json_decode($entityBody, TRUE);

error_log($imageString = $decoded["TableName"]);
error_log($imageString = $decoded["Date"]);
error_log($imageString = $decoded["Time"]);
error_log($imageString = $decoded["Onsite"]);
error_log($imageString = $decoded["signatureURL"]);

$tableName = $decoded["TableName"];
$Date = $decoded["Date"];
$Time = $decoded["Time"];
$Onsite = $decoded["Onsite"];
$signatureURL = $decoded["signatureURL"];


// Attempt insert query execution
$sql = "INSERT INTO `$tableName` (Date, Time, OnSite, Sign) VALUES ('$Date', '$Time', '$Onsite', '$signatureURL')";



 $response = array();
if(mysqli_query($link, $sql)){
    //echo "Records added successfully.";
    error_log("Records added successfully");
    $response['success'] = 'true';

} else{
   // echo "ERROR: Could not able to execute $sql. ";
    
    error_log(mysqli_error($link));
    $response['success'] = 'false';
}
 
// Close connection
mysqli_close($link);





//error_log(json_encode($_POST));
 //error_log(json_decode(json_encode($_POST)));

 //$response['received'] = 'should be';


echo json_encode($response);

?>
