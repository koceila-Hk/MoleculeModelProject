<?php

require_once './Config.php';

function url(string $uri) {
    return Config::BASE_URL . $uri;
}

function redirect(string $url) {
    header('location: ' . url($url));
    die;
}
