<?php

//get the posted json data
 $entityBody = file_get_contents('php://input');
 
//decode the json data
 $decoded = json_decode($entityBody, TRUE);

$imageString = $decoded["image"];

//create a unique name for the image
 $filename_path = md5(time().uniqid()).".png"; 
 //converted the image string back to image
 $data = base64_decode($imageString);
 //put it on the desired location
 file_put_contents('../AllImages/uploads/signature/'.$filename_path, $data);

 $response = array();
 //create the response 
 $response['sign'] = '../AllImages/uploads/signature/'.$filename_path;

echo json_encode($response);
?>
