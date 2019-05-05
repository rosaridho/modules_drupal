<?PHP
$fields = array( 
'app_id' => "921d9c54-239f-422a-933c-1e2cdac3bb5a",
'identifier' => "ce777617da7f548fe7a9ab6febb56cf39fba6d382000c0395666288d961ee566", 
'language' => "en", 
'timezone' => "-28800", 
'game_version' => "1.0", 
'device_os' => "9.1.3", 
'device_type' => "0", 
'device_model' => "iPhone 8,2", 
'tags' => array("foo" => "bar") 
); 

$fields = json_encode($fields); 
print("\nJSON sent:\n"); 
print($fields); 

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/players"); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
curl_setopt($ch, CURLOPT_HEADER, FALSE); 
curl_setopt($ch, CURLOPT_POST, TRUE); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 

$response = curl_exec($ch); 
curl_close($ch); 

$return["allresponses"] = $response; 
$return = json_encode( $return); 

print("\n\nJSON received:\n"); 
print($return); 
print("\n");

?>