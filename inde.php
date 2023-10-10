<?php
$captcha_response = $_POST['h-captcha-response'];
$secret_key = 'ES_10cc1f74a5144c2ab04c37c4265f4c36';

$url = 'https://hcaptcha.com/siteverify';
$data = [
    'secret' => $secret_key,
    'response' => $captcha_response,
];

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data),
    ],
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$response = json_decode($result);

if ($response->success) {
    // CAPTCHA válido, continue com o processamento do formulário
} else {
    // CAPTCHA inválido, exiba uma mensagem de erro
}
?>
