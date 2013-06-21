<?php
$article = 'upload';
$target_path = "uploads/";
$filename = $_FILES['my_file']['name'];

$target_path = $target_path . basename( $_FILES['my_file']['name']);


if(move_uploaded_file($_FILES['my_file']['tmp_name'],$target_path))
    $returnok = 'Your file upload was successful';
else
    $returnok =  'There was an error during the file upload.  Please try again.';