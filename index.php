<?php
require 'model.php';
require 'query.php';

/**
 * Методы API
	#/private/api/v2/json/accounts/current - информация об аккаунте

	#/private/api/v2/json/leads/list - список сделок
	#/private/api/v2/json/contacts/list - список контактов
	#/private/api/v2/json/company/list - список компаний

	#/private/api/v2/json/leads/set - добавить/обновить сделку
	#/private/api/v2/json/contacts/set - добавить/обновить сделку
	#/private/api/v2/json/company/set - добавить/обновить сделку

	#/api/unsorted/add/?api_key=".$user["USER_HASH"]."&login=".$user["USER_LOGIN"]." - добавить в неразобранное
	#/api/unsorted/list/?api_key=".$user["USER_HASH"]."&login=".$user["USER_LOGIN"]." - список неразобранного

	#/private/api/v2/json/webhooks/list - список WebHooks
	#/private/api/v2/json/webhooks/subscribe - добавить WebHook
	#/private/api/v2/json/webhooks/unsubscribe - удалить WebHook

	#/private/api/v2/json/contacts/links - Связи между сделками и контактами
 *
 * @var $data
 */

define('HOST', TRUE);
define('NEWACC', FALSE);

// Информация об аккаунте
if(HOST) {
    $domain = 'main3.amocrm2.saas';

    $user = [
        'USER_LOGIN' => 'twist.tracer@gmail.com',
        'USER_HASH' => '6b3d5b27d51c60a3c72af0c452250cd6'
    ];

    $subdomain = 'sbogdanov';
} else {
    $domain = 'amocrm.ru';

    $user = [
        'USER_LOGIN' => 'twist.tracer@gmail.com',
        'USER_HASH' => 'e368ec5528196d5a81a5664db1f9050b'
    ];

    if(NEWACC) {
        $subdomain = 'bogdanovnew';
    } else {
        $subdomain = 'bogdanov';
    }
}

/** Настройки запроса **/
/* Cсылка на метод API */
$link = "https://".$subdomain.".".$domain."/private/api/v2/json/company/set";
/* Тип запроса: */
# FALSE (GET запрос, параметры нужно указать в url),
# CURLOPT_POST (Стандартный пост запрос),
# CURLOPT_CUSTOMREQUEST (Пост с телом запроса, например JSON)
$type = 'CURLOPT_CUSTOMREQUEST';

$log = FALSE;

$headers = [
	'Accept: application/json'
];

$request_str = ($type == 'CURLOPT_CUSTOMREQUEST' || $type == 'CURLOPT_POST') ? file_get_contents('query.php', NULL, NULL, 20) : $link;
$status = "default";

if(isset($_POST["query"]) && $_POST["query"] == "get_request_contents") {
    die($request_str);
}

if(isset($_POST["query"]) && $_POST["query"] == "send_request") {
    if(!auth($user, $subdomain, $domain)) {
        die(json_encode(["status" => "danger", "response_str" => "Авторизация не удалась!"]));
    } else {
        $response = send_request($link, $data, $type, $log, $headers); // get_entity_ids($entity, $link, $data, $type, $log, $headers)
        $status = ((int)$response["code"] != 200 && (int)$response["code"] != 201 && (int)$response["code"] != 204)? "danger" : "success";
        die(json_encode(["status" => $status, "response_str" => $response["response_str"]]));
    }
}

if(isset($_GET["page"]) && $_GET["page"] == "test_ajax") {
    $page = Template("test_ajax_page.php");
} else {
    $page = Template("template.php", array(
        "request_str" => $request_str,
        "status" => $status
    ));
}

echo $page;