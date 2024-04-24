<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$discord_webhook_url = 'https://discord.com/api/webhooks/1232645671685722146/8A1EGJxYc-ZNKAKQ0rxypDPgkxHxh7N7m7oCbuskNKXSXcxyhIFHTDtcikJ0l5BQUxGX';

$data = [
    'username' => 'Nouveau formulaire',
    'content' => "Nouveau formulaire envoyé par :\nNom : $name\nPseudo : $email\nMessage : $message",
];

$options = [
    'http' => [
        'header'  => "Content-type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data),
    ],
];

$context  = stream_context_create($options);
$result = file_get_contents($discord_webhook_url, false, $context);

if ($result === FALSE) {
    /* Handle error */
}

header('Location: contact.html');