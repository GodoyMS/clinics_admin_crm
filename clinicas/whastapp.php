
<?php 
 
// Update the path below to your autoload.php, 
// see https://getcomposer.org/doc/01-basic-usage.md 
require  'twilio-php-main/src/Twilio/autoload.php'; 
 
use Twilio\Rest\Client; 
 
$sid    = "ACefbd0fc8797a2f16a1779f80a8c14310"; 
$token  = "41051dbeadd451e2d8b590b243e882ac"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create("whatsapp:+51913464041", // to 
                           array( 
                               "from" => "whatsapp:+14155238886",       
                               "body" => "Hi this is a message, 2019. Details: http://www.yummycupcakes.com/" 
                           ) 
                  ); 
 
?>
