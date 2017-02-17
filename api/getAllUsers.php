<?php
//including the file dboperation
require_once '../includes/DbOperation.php';

//creating a response array to store data
$response = array();

//creating a key in the response array to insert values
//this key will store an array iteself
$response['users'] = array();

//$response2['DailyRecord'] = array();

//creating object of class DbOperation
$db = new DbOperation();

// $result = $db->getImageByName();
// while($resultsingle = $result->fetch_assoc()){

// 	$temp = array();

// 	$temp['id']=$resultsingle['id'];
// 	$temp['Date']=$resultsingle['Date'];
// 	$temp['Time']=$resultsingle['Time'];

// 	array_push($response2['DailyRecord'], $temp);

// }

//echo $temp




//getting the teams using the function we created
$users = $db->getAllData();

//a method should return a image by given na
//it should return the full url of given user

//looping through all the teams.
while($user = $users->fetch_assoc()){
    //creating a temporary array
    $temp = array();

    //inserting the team in the temporary array
    $temp['id'] = $user['ID'];
    $temp['Name']=$user['Name'];
    $temp['TableName']=$user['Databse'];
   // base64_encode(file_get_contents('path/to/image.png'));
    //$temp['Photo_base64_encoded']= base64_encode("http://10.10.10.72/Test/api/" . $user['Photo']);

    //http://192.168.1.7
    $temp['Photo_Url'] = "http://10.0.0.77/Test/AllImages/" . $user['Photo'];
    //$temp['UserImage']=


    //inserting the temporary array inside response
    array_push($response['users'],$temp);
}

//displaying the array in json format, and return the resul to the app
echo json_encode($response);
?>