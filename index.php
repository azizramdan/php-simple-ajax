<?php

function page(string $path): void
{
    include __DIR__.'/pages/'.$path.'.php';
}

function url(string $path): bool
{
    return trim(path(), '/') == trim($path);
}

function path(): string
{
    return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}

switch (path()) {
    case url('/'):
        page('index');
        break;
    case url('endpoint-a'):
        page('endpoint-a');
        break;
    
    default:
        page('404');
        break;
}