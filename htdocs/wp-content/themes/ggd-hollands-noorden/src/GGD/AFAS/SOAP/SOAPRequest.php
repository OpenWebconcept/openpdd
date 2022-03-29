<?php

namespace GGD\AFAS\SOAP;

use \SoapClient;

class SOAPRequest
{
    /**
     * @var \SoapClient
     */
    protected $client;

    public function __construct(SoapClient $client)
    {
        $this->client = $client;
    }

    public function executeSoapCall(string $xml, string $soapCall): object
    {
        try {
            $soapBody = new \SoapVar(trim($xml), \XSD_ANYXML);
            $response = $this->client->__SoapCall($soapCall, [$soapBody]);
        } catch (\Exception $e) {
            throw new \Exception(sprintf('Error occured while executing a SOAP call. Error %s', $e->getMessage()));
        }

        return $response;
    }

    public function decodeResponseObject(object $responseObject, string $resultProperty): array
    {
        if (!property_exists($responseObject, $resultProperty)) {
            return [];
        }

        $xmlstring = $responseObject->{$resultProperty};
        $xml = simplexml_load_string($xmlstring, "SimpleXMLElement", LIBXML_NOCDATA);
        $decoded = json_decode(json_encode($xml), TRUE);

        if (!$decoded) {
            return [];
        }

        return $decoded;
    }
}
