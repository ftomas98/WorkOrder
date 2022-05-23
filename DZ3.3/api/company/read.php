<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/josn');

    include_once '../../config/Database.php';
    include_once '../../models/company.php';

    //Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate company post object
    $company = new company($db);

    //Company query
    $result = $company->read();

    //Get row count
    $num = $result->rowCount();

    if($num > 0){
        $companies_array = array();
        //$companies_array['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $company_item = array(
                'id' => $id,
                'company_name' => $company_name,
                'address' => $address,
                'phone' => $phone,
                'fax' => $fax,
                'email' => $email,
                'website' => $website,
                'description' => $description,
            );

            //Push to $comapnies_array
            array_push($companies_array, $company_item);
        }

        //Turn to JSON output
        echo json_encode($companies_array);

    } else{
        echo json_encode(
            array('message' => 'No Dispatchers found')
        );
    }