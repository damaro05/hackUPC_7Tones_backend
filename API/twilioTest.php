// Send an SMS using Twilio's REST API and PHP
<?php
$sid = "AC9ec382839065e0162ec0db33f12c3d97"; // Your Account SID from www.twilio.com/console
$token = "5d42b327ee95fcbd34d9dc189a15afdd"; // Your Auth Token from www.twilio.com/console

$client = new Twilio\Rest\Client($sid, $token);
$message = $client->messages->create(
  '34634558589', // Text this number
  array(
    'from' => '34931070623', // From a valid Twilio number
    'body' => '7tones: primer test amb Twilio!'
  )
);

print $message->sid;
