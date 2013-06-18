<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
echo nl2br ($name."\n") ;
echo nl2br ($email."\n") ;
echo nl2br ($message."\n") ;
echo "Thank You!";
