<?php
date_default_timezone_set('Asia/Makassar');
$dateEncode = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(date('Y-m-d H:i'))))))))));

$date2 = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(date('Y-m-d H:i:s'))))))))));

$date3 = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(date('Y-m-d'))))))))));

$time = base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(date('H:i'))))))))));
