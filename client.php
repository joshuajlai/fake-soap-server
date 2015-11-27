<?php

$options = array(
    'location' => 'http://soap.dev.hautelook.com/server.php',
    'uri' => 'http://soap.dev.hautelook.com/'
);
//create an instante of the SOAPClient (the API will be available)
$api = new SoapClient('wsdls/Tax.wsdl', $options);
//call an API method
print_r($api->GetTax());
