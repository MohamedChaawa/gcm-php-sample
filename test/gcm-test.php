<?php
	include_once '../GCM.php'; 
	$registatoin_ids = array('Registration ID');
    $title = 'Message title';
	$message = 'Hello World!';
    $gcm = new GCM();
    $result = $gcm -> sendNotification($registatoin_ids, $title, $message);	
	echo $result;
?>