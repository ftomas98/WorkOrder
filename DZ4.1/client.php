<html>
    <form method="post">
        <input type="radio" id="html" name="currency" value="BAM-to-HRK" checked="checked">
        <label for="html">BAM to HRK</label><br>
        <input type="radio" id="css" name="currency" value="HRK-to-BAM">
        <label for="css">HRK to BAM</label><br>
        <input type="radio" id="javascript" name="currency" value="BAM-to-RSD">
        <label for="javascript">BAM to RSD</label><br>
        <input type="radio" id="html" name="currency" value="RSD-to-BAM">
        <label for="html">RSD to BAM</label><br>
        

        <input type="number" id="amount" name="amount">
        <input type="submit" value="Convert" name="submit" action="pozoviServer()">
    </form>
</html>



<?php
//function pozoviServer(){
if(isset($_POST['submit'])){
    try{
        $amount = 0;
        $currency = $_POST['currency'];
        if(isset($_POST['amount'])){
            $amount = $_POST['amount'];
        }
        ini_set('soap.wsdl_cache_enabled',0);
        ini_set('soap.wsdl_cache_ttl',0);
    
        $sClient = new SoapClient('http://localhost/WorkOrder/DZ4.1/hello.wsdl', array('cache_wsdl'=>WSDL_CACHE_NONE));

        $params = array(
            'currency'    =>    $currency,
            'amount'    =>    $amount);
        $response = $sClient->doHello($params);
    
        $sClient->__getLastResponse();

        var_dump($response);

        } catch(SoapFault $e){
        var_dump($e);
        echo $e;
        }
        {
            print($sClient->__getLastResponse());
        }
    }
?>