<?PHP
$playerID = '7b1529c3-87c0-414c-9074-21704f783f9a';
$fields = array( 
'app_id' => "921d9c54-239f-422a-933c-1e2cdac3bb5a",
'tags' => array('OneSignal_Example_Tag' => 'YES')
); 
$fields = json_encode($fields); 

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, 'https://onesignal.com/api/v1/players/'.$playerID); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HEADER, false); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
$response = curl_exec($ch); 
curl_close($ch); 

$resultData = json_decode($response, true);
echo $resultData;
?>