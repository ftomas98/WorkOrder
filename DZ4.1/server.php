<?php

if(!extension_loaded("soap")){
   dl("php_soap.dll");
}

ini_set("soap.wsdl_cache_enabled","0");

$server = new SoapServer("hello.wsdl");

function doHello($params){
    $currency = $params['currency'];
    $amount = $params['amount'];

    if($currency == "BAM-to-HRK"){
        $amount *= 3.86;
        return $amount;
    }
    else if($currency == "HRK-to-BAM"){
        $amount *= 0.26;
        return $amount;
    }
    else if($currency == "BAM-to-RSD"){
        $amount *= 60.18;
        return $amount;
    }
    else if($currency == "RSD-to-BAM"){
        $amount *= 0.017;
        return $amount;
    }
}

$server->AddFunction("doHello");
$server->handle();
?>