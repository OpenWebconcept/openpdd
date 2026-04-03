<?php

declare(strict_types=1);

namespace GGD\AFAS\SOAP\Requests;

use function GGD\AFAS\Helpers\resolve;
use function GGD\AFAS\Helpers\view;
use GGD\AFAS\SOAP\SOAPGetRequest;

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
			'email' => $this->emailaddress,
		]);

		$responseObject = $this->request->executeSoapCall($xml, 'GetData');
		$result = $this->request->decodeResponseObject($responseObject, 'GetDataResult');

		return $result['Yard_persoon'] ?? [];
	}
}
