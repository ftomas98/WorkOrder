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

    include_once '../../config/Database.php';
    include_once '../../models/dispatcher.php';

    //Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate dispatcher post object
    $dispatcher = new dispatcher($db);

    //Dispatcher query
    $result = $dispatcher->read();

    //Get row count
    $num = $result->rowCount();

    if($num > 0){
        $dispatchers_array = array();
        //$dispatchers_array['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $dispatcher_item = array(
                'id' => $id,
                'name' => $name,
                'phone' => $phone,
                'users_name' => $users_name
            );

            //Push to $dispatchers_array
            array_push($dispatchers_array, $dispatcher_item);
        }

        //Turn to JSON output
        echo json_encode($dispatchers_array);

    } else{
        echo json_encode(
            array('message' => 'No Dispatchers found')
        );
    }