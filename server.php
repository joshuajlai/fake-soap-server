<?php

$wsdl = dirname(__FILE__) . '/wsdls/Tax.wsdl';
if (! is_file($wsdl)) {
    echo 'Missing wsdl file';
}
$serverSleep = 100;
$soapServer = new SoapServer($wsdl);
$soapServer->setObject(new FakeSoapServer($serverSleep));
$soapServer->handle();

class FakeSoapServer
{
    protected $sleepTime = 0;

    public function __construct($sleepTime)
    {
        $this->sleepTime = $sleepTime;
    }

    public function __call($method, $args)
    {
        if ($this->sleepTime) {
            sleep($this->sleepTime);
        }
        $fakeResponse = 'fake response';

        return $fakeResponse;
    }
}
