<?php

switch ($_SERVER["REQUEST_URI"]) {
    case '/endpoint-a':
        include __DIR__.'/endpoint-a.php';
        break;
    
    default:
        echo '404';
        break;
}