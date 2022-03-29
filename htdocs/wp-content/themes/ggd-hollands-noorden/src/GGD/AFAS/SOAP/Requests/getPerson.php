<?php

namespace GGD\AFAS\SOAP\Requests;

use GGD\AFAS\SOAP\SOAPGetRequest;
use function GGD\AFAS\Helpers\resolve;
use function GGD\AFAS\Helpers\view;

class getPerson
{
    protected SOAPGetRequest $request;
    protected string $emailaddress;

    public function __construct(SOAPGetRequest $request, string $emailaddress)
    {
        $this->request = $request;
        $this->emailaddress = $emailaddress;
    }

    public function get()
    {
        $xml = view('get-person.php', [
            'token' => resolve('TokenAFAS'),
            'email' => $this->emailaddress
        ]);

        $responseObject = $this->request->executeSoapCall($xml, 'GetData');
        $result = $this->request->decodeResponseObject($responseObject, 'GetDataResult');

        return $result['Yard_persoon'] ?? [];
    }
}
