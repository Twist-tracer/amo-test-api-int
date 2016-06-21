<?php 
require 'model.php';
require 'query.php';

// Информация об аккаунте
$user = [
    'USER_LOGIN' => '_-radriges-_@mail.ru',
    'USER_HASH' => 'd54542614f251a774142bbbd680992f9'
];
$subdomain = 'new57612121a3a6b';

// Настройки запроса
$link = "https://".$subdomain.".amocrm.ru/private/api/v2/json/leads/list?limit_rows=5"; #ссылка на метод API
$type = FALSE; #Тип запроса: FALSE(GET запрос, параметры нужно указать в url), CURLOPT_POST(Стандартный пост запрос), CURLOPT_CUSTOMREQUEST(Пост с телом запроса, например JSON)

$request_str = file_get_contents('query.php', NULL, NULL, 20);
$status = "default";

if(isset($_POST["query"]) && $_POST["query"] == "send_request") {
    if(!auth($user, $subdomain)) {
        echo json_encode(["status" => "danger", "response_str" => "Авторизация не удалась!"]);
        exit;
    } else {
        $response = send_request($link, $data, $type);
        $status = ((int)$response["code"] != 200 && (int)$response["code"] != 204)? "danger" : "success";
        echo json_encode(["status" => $status, "response_str" => $response["response_str"]]);
        exit;
    }
}

$page = Template("template.php", array(
    "request_str" => $request_str,
    "status" => $status
));

echo $page;