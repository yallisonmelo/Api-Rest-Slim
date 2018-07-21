<?php

require_once '../Utilidades/Slim/Slim.php';
require_once '../Controller/Controller.Usuario.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$request = $app->request();
$response = $app->response();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');

function echoResponse($status_code, $response) {
    $app = \Slim\Slim::getInstance();
    $app->status($status_code);
    $app->contentType('application/json');
    echo json_encode($response);
}

/* Esta Função serve Para Exibir uma Mensagem em Caso de Acesso ao Serviço sem Conhecimento previo das Funções.
 * Caso retirada será exibida uma mensgem padrao do Slim.
 */

$app->get('/', function () {
    echo "Web Service Iniciantes";
});

$app->Get('/Usuarios/', function () use ($app) {
    Listar_Usuarios();
});

$app->Get('/Usuario/:id', function ($id) use ($app) {
    Listar_Usuario_id($id);
});


$app->post('/Usuario/', function () use ($app) {
    Inserir_Usuario();
});

$app->put('/Usuario/:id', function ($id) use ($app) {
    Atualizar_Usuario($id);
});


$app->delete('/Usuario/:id', function ($id) use ($app) {
    Deletar_Usuario($id);
});

$app->run();
