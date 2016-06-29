<?php
header('Content-Type: text/html; charset=utf-8');
if(isset($_GET["access_token"]) && $_GET["access_token"] == "start_test_ajax_now") {

    if(isset($_POST["test_1"])) {
        if(!empty($_POST["test_1"])) {
            echo "Запрос к test_1 прошел успешно";
            exit;
        } else {
            echo "Запрос к test_1 прошел успешно. Но запрос был пустым.";
            exit;
        }
    }

    if(isset($_POST["test_2"])) {
        if(!empty($_POST["test_2"])) {
            echo "Запрос к test_2 прошел успешно";
            exit;
        } else {
            echo "Запрос к test_2 прошел успешно. Но запрос был пустым.";
            exit;
        }
    }

    if(isset($_POST["test_3"])) {
        if(!empty($_POST["test_3"])) {
            echo "Запрос к test_3 прошел успешно";
            exit;
        } else {
            echo "Запрос к test_3 прошел успешно. Но запрос был пустым.";
            exit;
        }
    }

    if(isset($_POST["test_4"])) {
        if(!empty($_POST["test_4"])) {
            echo "Запрос к test_4 прошел успешно";
            exit;
        } else {
            echo "Запрос к test_4 прошел успешно. Но запрос был пустым.";
            exit;
        }
    }
    if(isset($_POST["test_5"])) {
        if(!empty($_POST["test_5"])) {
            echo "Запрос к test_5 прошел успешно";
            exit;
        } else {
            echo "Запрос к test_5 прошел успешно. Но запрос был пустым.";
            exit;
        }
    }

} else echo "Для работы сервиса передайте ключ доступа!";
