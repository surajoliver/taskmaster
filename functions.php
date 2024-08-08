<?php

function dd($txt) 
{
    echo '<pre>';
    var_dump($txt);
    echo '</pre>';
    die();
}

function getUri()
{
    $url = $_SERVER['REQUEST_URI'];
    $urlParts = explode('?', $url);
    $uri = $urlParts[0];
    return $uri;
}

function uri($text)
{
    return getUri() === $text;
}

function uriParams()
{
    $url = $_SERVER['REQUEST_URI'];
    $urlParts = explode('?', $url);
    $queryString = $urlParts[1] ?? '';
    parse_str($queryString, $queryArray);
    return $queryArray;
}

function base_path($path){ 
    $newPath = BASE_PATH  . $path;
    $newPath = str_replace("\\", "/", $newPath);
    return $newPath;
}


function myAutoloader($className) {
    $classFile = base_path('classes/' . $className . '.php');
    //echo $classFile;
    if (file_exists($classFile)) {
        require $classFile;
    }
}

spl_autoload_register('myAutoloader');