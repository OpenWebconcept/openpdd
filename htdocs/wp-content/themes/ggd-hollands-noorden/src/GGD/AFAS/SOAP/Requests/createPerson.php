<?php

declare(strict_types=1);

namespace GGD\AFAS\SOAP\Requests;

use function GGD\AFAS\Helpers\resolve;
use function GGD\AFAS\Helpers\view;
use GGD\AFAS\Models\FormData;
use GGD\AFAS\SOAP\SOAPPostRequest;

class createPerson
{
	protected SOAPPostRequest $request;
	protected FormData $data;

	public function __construct(SOAPPostRequest $request, FormData $data)
	{
		$this->request = $request;
		$this->data = $data;
	}

	public function create(): array
	{
		$xml = view('create-person.php', [
			'token' => resolve('TokenAFAS'),
			'firstName' => $this->data->firstName(),
			'lastNamePrefix' => $this->data->lastNamePrefix(),
			'lastName' => $this->data->lastName(),
			'gender' => $this->data->gender(),
			'phonenumber' => $this->data->phonenumber(),
			'email' => $this->data->email(),
			'street' => $this->data->street(),
			'housenumber' => $this->data->housenumber(),
			'postalCode' => $this->data->postalCode(),
			'city' => $this->data->city(),
		]);

		$responseObject = $this->request->executeSoapCall($xml, 'Execute');
		$result = $this->request->decodeResponseObject($responseObject, 'ExecuteResult');

		return $result['KnPerson'] ?? [];
	}
}
