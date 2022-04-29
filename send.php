<?php

function sendPushNotification($fields = array())
{
    $API_ACCESS_KEY = 'AAAAHW7T5h0:APA91bGrpSVBZoGXZqbSFWEE0aWa5vdNu2oWowUuC957phHu6SltlHedmSZsFVvKG3bvHoE1mdy4OCdy626N6DXVe0yFb6L37iJDopP7wSN3oLhWDaCbPwtAVnrRwalzMX74--x3jhpl';
    $headers = array
    (
        'Authorization: key=' . $API_ACCESS_KEY,
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch );
    curl_close( $ch );
    echo $result;
}

$title = "Test 8";
$message = "Hello World 4";

$fields = array
(   
    //'to'  => 'e_wsRZleFV9WxgUmB5nEN4:APA91bHiZRMrODIX0lr8JcMR2NSQP0QfcDNs89oxJWS6JMPrvCUx4tQLIGHbRO4JPWVo_n7PjcgJNUzsGSAkIwvH_o2oA-IxkkxL_5VvQ-tnUtE9ZpHxe_0s16V3w6hiGzKUbfhvRyNv',
    'registration_ids' => array(
    "cH7ketbFRtiLCoPh2d9-sI:APA91bHOOn8tnxG2f3dI4xc0g-7cUbRXX0kDCt0XsOjGVKQwG_DXj5s-uhSfE3wus-xKLJJ8p0PbZC__3i3WnfCXzEWzmb1lPe6ZmRcz4GE42qLm-6mJWQ2vRAo_upEhVTtYjAQjMJkb"
                            ),
    'priority' => 'high',
    'notification' => array(
        'body' => $message,
        'title' => $title,
        'sound' => 'default',
        'icon' => '',
       	'image'=> 'https://vcdn-dulich.vnecdn.net/2020/09/04/1-Meo-chup-anh-dep-khi-di-bien-9310-1599219010.jpg'
    ),
    'data' => array(
        'message' => $message,
        'title' => $title,
        'sound' => 'default',
        'icon' => '',
        'image'=> 'https://vcdn-dulich.vnecdn.net/2020/09/04/1-Meo-chup-anh-dep-khi-di-bien-9310-1599219010.jpg',
        "click_action" => "https://google.com",
    )
);

sendPushNotification($fields);