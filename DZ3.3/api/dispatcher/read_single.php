<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/josn');

    include_once '../../config/Database.php';
    include_once '../../models/dispatcher.php';

    //Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate dispatcher post object
    $dispatcher = new dispatcher($db);

    //Get ID from URL
    $dispatcher->id = isset($_GET['id']) ? $_GET['id'] : die();

    //Get dispatcher
    $dispatcher->read_single();

    //Create array
    $dispatchers_array = array(
        'id' => $dispatcher->id,
        'name' => $dispatcher->name,
        'phone' => $dispatcher->phone,
        'users_name' => $dispatcher->users_name
    );

    print_r(json_encode($dispatchers_array));