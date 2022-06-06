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
    include_once '../../models/company.php';

    //Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate company post object
    $company = new company($db);

    //Get ID from URL
    $company->id = isset($_GET['id']) ? $_GET['id'] : die();

    //Get company
    $company->read_single();

    //Create array
    $companies_array = array(
        'id' => $company->id,
        'company_name' => $company->company_name,
        'address' => $company->address,
        'phone' => $company->phone,
        'fax' => $company->fax,
        'email' => $company->email,
        'website' => $company->website,
        'description' => $company->description
    );

    print_r(json_encode($companies_array));