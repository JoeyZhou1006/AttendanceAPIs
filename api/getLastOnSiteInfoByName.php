<?php
//including the file dboperation
require_once '../includes/DbOperation.php';

//creating a response array to store data
$response = array();

//creating a key in the response array to insert values
//this key will store an array iteself
$response['LastOnsiteData'] = array();

//$response2['DailyRecord'] = array();

//creating object of class DbOperation
$db = new DbOperation();

$postVar = $_GET['Name'];
//$postVar = 'TishCustance';

//getting the teams using the function we created
$result = $db->getLastRecordOfStaff($postVar);

$temp = array();

//$temp['OnSite'] = (int)$result;



//$temp = ['Onsite': (int)$result]

//a method should return a image by given na
//it should return the full url of given user

//looping through all the teams.

    //creating a temporary array
   

    //inserting the team in the temporary array
 
    //$temp['Name']=$user['Name'];



   // base64_encode(file_get_contents('path/to/image.png'));
    //$temp['Photo_base64_encoded']= base64_encode("http://10.10.10.72/Test/api/" . $user['Photo']);

    //http://192.168.1.7
   // $temp['Photo_Url'] = "http://10.10.10.72/Test/AllImages/" . $user['Photo'];
    //$temp['UserImage']=


    //inserting the temporary array inside response
   // array_push($response['LastOnsiteData'], array('OnSite',(int)$result));


//displaying the array in json format, and return the resul to the app
echo $result;
?>