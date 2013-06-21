<?php

$session = (isset($_COOKIE[session_name()])) ? $_COOKIE[session_name()] : NULL;

$login = 'login';

if ($session) {
    session_start();

    $article = NULL;
} else {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $check = TRUE;
        if ($check) {
            session_start();
            header('Location: ' . '../');
        }
    } else {
        $article = 'login';
    }
}

