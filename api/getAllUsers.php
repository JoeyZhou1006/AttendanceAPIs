<?php
//including the file dboperation
require_once '../includes/DbOperation.php';

//creating a response array to store data
$response = array();

//creating a key in the response array to insert values
//this key will store an array iteself
$response['users'] = array();


//creating object of class DbOperation
$db = new DbOperation();


//getting the teams using the function we created
$users = $db->getAllData();

//a method should return a image by given na
//it should return the full url of given user

//looping through all the teams.
while($user = $users->fetch_assoc()){
    //creating a temporary array
    $temp = array();
    
    //inserting the data in the temporary array
    $temp['id'] = $user['ID'];
    $temp['Name']=$user['Name'];
    $temp['TableName']=$user['Databse'];
    $temp['Photo_Url'] = "http://10.0.0.77/Test/AllImages/" . $user['Photo'];


    //inserting the temporary array inside response array
    array_push($response['users'],$temp);
}

//displaying the array in json format, and return the result to the app
echo json_encode($response);
?>
