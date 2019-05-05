<?PHP
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://onesignal.com/api/v1/notifications?app_id=921d9c54-239f-422a-933c-1e2cdac3bb5a&limit=50&offset=0",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: Basic Y2QzNzY4YmYtMGI0MC00OTg5LWE0MzAtM2Y4ODI4YTY0ZGY3",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

echo $response;
?>