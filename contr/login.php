<?php

$session = $_COOKIE[session_name()];


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

