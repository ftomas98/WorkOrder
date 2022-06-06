<?php
    //Headers
    if(strcmp($_SERVER['PHP_AUTH_USER'], 'admin') !== 0 || strcmp($_SERVER['PHP_AUTH_PW'], 'admin123') !== 0){
        header("WWW-Authenticate: Basic realm='Unesite ime i lozinku'");
        header("HTTP/ 1.0 401 Unauthorized");
        echo 'Greška prilikom autentikacije, provjerite korisnicko ime i lozinku';
        exit;
    }

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/josn');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


    include_once '../../config/Database.php';
    include_once '../../models/dispatcher.php';

    //Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate dispatcher object
    $dispatcher = new dispatcher($db);

    $data = json_decode(file_get_contents("php://input"));

    $dispatcher->id = $data->id;

    $dispatcher->name = $data->name;
    $dispatcher->phone = $data->phone;
    $dispatcher->users_id = $data->users_id;

    if($dispatcher->update()){
        echo json_encode(array('message' => 'Dispatcher Updated'));
    }
    else{
        echo json_encode(array('message' => 'Dispatcher Not Updated'));
    }