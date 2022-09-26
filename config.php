<?php

error_reporting(0);
$title = "K";

function base_url()
{
    $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';

    return $protocol . '://' . $_SERVER['SERVER_NAME'] . '/_2021/kiryuu.co';
    // return 'http://localhost/jtoday';
}
function url()
{
    return 'kikii.dev';
}
