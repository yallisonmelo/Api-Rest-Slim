<?php

require_once '../Model/Usuario.php';

Function Listar_Usuarios() {
    try {
        $obj = new Usuario();
        $Retorno = $obj->Listar_Usuarios();
        echoResponse(200, $Retorno);
    } catch (Exception $ex) {
        $app->stop();
    }
}

Function Listar_Usuario_id($id) {
    try {
        $obj = new Usuario();
        $Retorno = $obj->Listar_Usuario_id($id);
        echoResponse(200, $Retorno);
    } catch (Exception $ex) {
        $app->stop();
    }
}

Function Inserir_Usuario() {
    try {
        $obj = new Usuario();
        $app = new \Slim\Slim();
        $request = $app->request();
        $obj->setNome($request->post('nome'));
        $obj->setEmail($request->post('email'));
        $obj->setSenha($request->post('senha'));
        $Retorno = $obj->Inserir_Usuario();
        if ($Retorno) {
            $response['sucesso'] = $Retorno;
            echoResponse(200, $response);
        } else {
            echoResponse(200, $response);
        }
    } catch (Exception $ex) {
        $app->stop();
    }
}

Function Atualizar_Usuario($id) {
    try {
        $obj = new Usuario();
        $app = new \Slim\Slim();
        $request = $app->request();
        $obj->setNome($request->post('nome'));
        $obj->setEmail($request->post('email'));
        $obj->setSenha($request->post('senha'));
        $Retorno = $obj->Alterar_Usuario($id);
        if ($Retorno) {
            $response['sucesso'] = $Retorno;
            echoResponse(200, $response);
        } else {
            echoResponse(200, $response);
        }
    } catch (Exception $ex) {
        $app->stop();
    }
}

Function Deletar_Usuario($id) {
    try {
        $obj = new Usuario();
        $app = new \Slim\Slim();
        $request = $app->request();
        $Retorno = $obj->Delete_Usuario($id);
        if ($Retorno) {
            $response['sucesso'] = $Retorno;
            echoResponse(200, $response);
        } else {
            echoResponse(200, $response);
        }
    } catch (Exception $ex) {
        $app->stop();
    }
}
