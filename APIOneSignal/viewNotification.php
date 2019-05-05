<?PHP
		$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications/86ff1143-caa5-4f99-9be0-a594f2fcdc22?app_id=921d9c54-239f-422a-933c-1e2cdac3bb5a");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                           'Authorization: Basic Y2QzNzY4YmYtMGI0MC00OTg5LWE0MzAtM2Y4ODI4YTY0ZGY3'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);
		$return["allresponses"] = $response;
  	$return = json_encode( $return);
  
	  print("\n\nJSON received:\n");
	  print($return);
	  print("\n");
?>
