<?php
/**
 * Google Cloud Messaging (GCM)
 *
 * @author Mohamed Chaawa
 */
class GCM {

    // constructor
    function __construct() {
        
    }

    /**
     * Sending Push Notification
     */
    public function sendNotification($registation_ids, $title, $message) {
        
        $success = true;

        define("GOOGLE_API_KEY", 'PUT-YOUR-GOOGLE_API_KEY-HERE');

        // Set POST variables
        $url = 'https://android.googleapis.com/gcm/send';
        
        $fields = array(
            'registration_ids' => $registation_ids,
            'data' =>  array('message' => $message, 'tickerText' => $message, 'contentTitle' => $title, 'contentText' => $message),
	    );

        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            $success = false;
        }

        // Close connection
        curl_close($ch);
        return $success;
    }
}
?>
