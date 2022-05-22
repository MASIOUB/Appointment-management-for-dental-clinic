<?php

function view($path, $data = [])
{
    header("content-type: text/html");
    extract($data);
    $path = dirname(__DIR__)."/views/$path.php";
    if (file_exists($path)){
        require_once $path;
    }
    else{
        die ("View doesn't exist");
    }
}


function json($data){
    header("content-type: application/json");
    echo json_encode($data);
}

function isPostRequest()
{
    return $_SERVER["REQUEST_METHOD"] === "POST";
}

function verify($required, $data): bool
{
    foreach ($required as $value) {
        if (empty($data[$value])) {
            return false;
        }
    }
    return true;
}

function redirect($path)
{
    header("location: /dentiste/$path");
}

function createLink($path)
{
    $path = trim($path, "/");
    return "/dentiste/$path";
}

function component($path, $data= []){
    view("/components/$path", $data);
}

function isLoggedIn()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    return isset($_SESSION["ref"]) && !empty($_SESSION["ref"]);
}

function createPatientSession($patient)
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION["ref"] = $patient["ref"];
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function currentUserRef(){
    if(!isLoggedIn()) return null;
    return $_SESSION["ref"];
}