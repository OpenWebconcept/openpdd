<?php

namespace GGD\AFAS\SOAP\Requests;

use GGD\AFAS\Models\FormData;
use GGD\AFAS\Models\Person;
use GGD\AFAS\SOAP\SOAPPostRequest;
use function GGD\AFAS\Helpers\resolve;
use function GGD\AFAS\Helpers\view;

class createSubject
{
    protected SOAPPostRequest $request;
    protected FormData $data;
    protected Person $person;

    public function __construct(SOAPPostRequest $request, Person $person, FormData $data)
    {
        $this->request = $request;
        $this->person = $person;
        $this->data = $data;
    }

    public function create(): array
    {
        $xml = view('create-subject.php', [
            'token' => resolve('TokenAFAS'),
            'bcCo' => $this->person->bcCo(),
            'complaint' => $this->data->complaint()
        ]);

        $responseObject = $this->request->executeSoapCall($xml, 'Execute');
        $result = $this->request->decodeResponseObject($responseObject, 'ExecuteResult');

        return $result['KnSubject'] ?? [];
    }
}
