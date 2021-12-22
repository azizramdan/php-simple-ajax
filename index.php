<?php

function page(string $path) : void
{
    include __DIR__.'/pages/'.$path.'.php';
}

switch ($_SERVER['REQUEST_URI']) {
    case '/':
        page('index');
        break;
    case '/endpoint-a':
        page('endpoint-a');
        break;
    
    default:
        page('404');
        break;
}