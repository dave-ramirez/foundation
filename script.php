<?php
$post_data = [
	'secret' => "K0Mj1QQfWxJgp87D5HIzXZAZvi4puvh5", // <- Your secret key
	'token' => $_POST['coinhive-captcha-token'],
	'hashes' => 1024
];

$post_context = stream_context_create([
	'http' => [
		'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		'method'  => 'POST',
		'content' => http_build_query($post_data)
	]
]);

$url = 'https://api.coinhive.com/token/verify';
$response = json_decode(file_get_contents($url, false, $post_context));

if ($response && $response->success) {
  echo "good";
} else {
  echo "Not good";
}
 ?>
