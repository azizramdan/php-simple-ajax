<?php
header('Access-Control-Allow-Origin: *');

$data = $_POST['data'];

sleep(1);

echo "data: {$data} | respon dari server";