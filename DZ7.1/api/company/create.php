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
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


    include_once '../../config/Database.php';
    include_once '../../models/company.php';

    //Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate company object
    $company = new company($db);

    $data = json_decode(file_get_contents("php://input"));

    $company->company_name = $data->company_name;
    $company->address = $data->address;
    $company->phone = $data->phone;
    $company->fax = $data->fax;
    $company->email = $data->email;
    $company->website = $data->website;
    $company->description = $data->description;

    if($company->create()){
        echo json_encode(array('message' => 'Post Created'));
    }
    else{
        echo json_encode(array('message' => 'Post Not Created'));
    }