<?php
$titulo = "Titulo de la notificacion";
$mensaje = "Cuerpo de la notificacion";
 ////////ENVÍO DE NOTIFICACIÓN/////////
// $fcmUrl = 'https://fcm.googleapis.com/v1/projects/fir-tutorial-aff99/messages:send';
$fcmUrl = 'https://fcm.googleapis.com/fcm/send';
$token  = 'dWKYNFKzQ3qiVs1Ik_8xuJ:APA91bEU21Zt1ZLFYhG2J5lzv-Xpm0jGTse1s58KKX-b-nGEqUHJopmF18Pb96IbOC7gQvmHxwyYLlShfyyu6ZDP7-nGgdNfEDA-XznwbCBgDPa6gSP-c9FDE4h3saF5nXgj1m7hCSOb';

$apiKey = 'AAAAHxN9ny0:APA91bGqZP0On7_cLFA0uV6pm0LHICjJDzlfv1gL6iUQlXQ0bYhaedGK7xCw7cS3e-aovxnBcZnJ4Ee0jYjXsTveomqFE_jsZHCpdaJzVaA1qIz2r-0S6ipWVthjsYCM5UzZshDi8bzF';
$fcmNotification = [
    'to' => $token,
    'notification' => [
        'title' => $titulo, 
        'body' => $mensaje
    ],
    'data' => [
        'score' => 'asdasd',
        'cscore' => "asdas"
    ]
];

$headers = ['Authorization: key=' .$apiKey, 'Content-Type: application/json'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $fcmUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
$result = curl_exec($ch);
curl_close($ch);
echo $result;