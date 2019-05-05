<?php
function createApp(){
    $fields = array(
        'name' => "ridhoBetelgeusePHP",
        'chrome_web_origin' => "https://mridhorosa.com/"
    );

    $fields = json_encode($fields);
    	print("\nJSON sent:\n");
    	print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/apps");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic MzgyZjYzNDktZjVmNy00ZDM3LTlmYzQtMTIxMTFkZTc1MGY0'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
}

$response = createApp();
	$return["allresponses"] = $response;
	$return = json_encode( $return);
	
	print("\n\nJSON received:\n");
	print($return);
	print("\n");
?>