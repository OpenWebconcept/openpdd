<?php declare(strict_types=1);

namespace GGD\AFAS;

use function GGD\AFAS\Helpers\resolve;
use GGD\AFAS\Models\FormData;
use GGD\AFAS\Models\Person;
use GGD\AFAS\TeamsLogger;

class AFAS
{
    public function __construct()
    {
        $this->teams = $this->resolveTeams();
    }

    public function resolveTeams(): TeamsLogger
    {
        try {
            if (!function_exists('GGD\AFAS\Helpers\resolve')) {
                throw new \Exception;
            }

            return TeamsLogger::make(resolve('teams'));
        } catch (\Exception $e) {
            return TeamsLogger::make(new \Psr\Log\NullLogger());
        }
    }

    public function afterFormSubmission(array $entry, array $form): array
    {
        if (strtolower($form['title']) !== 'klachtenformulier') {
            return $form;
        }

        $formData = [
            'firstName' => rgar($entry, '1'),
            'lastNamePrefix' => rgar($entry, '7'),
            'lastName' => rgar($entry, '2'),
            'gender' => rgar($entry, '3'),
            'street' => rgar($entry, '4.1'),
            'housenumber' => rgar($entry, '4.2'),
            'city' => rgar($entry, '4.3'),
            'postalCode' => rgar($entry, '4.5'),
            'email' => rgar($entry, '5'),
            'phonenumber' => rgar($entry, '6'),
            'complaint' => rgar($entry, '8'),
        ];

        $formData = new FormData($formData);

        try {
            $person = $this->getPerson($formData);
        } catch (\Exception $e) {
            $this->teams->addRecord('error', 'GGD klachtenformulier', [
                'message' => $e->getMessage()
            ]);
            $person = [];
        }

        try {
            $person = $this->handleNewPerson($formData, $person);
        } catch (\Exception $e) {
            $this->teams->addRecord('error', 'GGD klachtenformulier', [
                'message' => $e->getMessage()
            ]);
            return $form;
        }

        if (empty($person)) {
            return $form;
        }

        $subject = $this->createSubject(Person::makeFrom($person), $formData);

        if (empty($subject)) {
            $this->teams->addRecord('error', 'GGD klachtenformulier', [
                'message' => sprintf('AFAS error: could not create a subject in AFAS for person (%s).', $formData->email())
            ]);
        }

        return $form;
    }

    /**
     * Validate if the person already exists.
     */
    public function getPerson(FormData $formData): array
    {
        try {
            $person = (new \GGD\AFAS\SOAP\Requests\getPerson(resolve('SOAPGetRequest'), $formData->email()))->get();
        } catch (\Exception $e) {
            throw new \Exception(sprintf('AFAS error: could not retrieve person (%s) from AFAS. Error: %s.', $formData->email(), $e->getMessage()));
        }

        return $person;
    }

    protected function handleNewPerson(FormData $formData, array $person): array
    {
        if (!empty($person)) {
            return $person;
        }

        $this->createPerson($formData);

        return $this->getPerson($formData);
    }

    protected function createPerson(FormData $formData): array
    {
        $person = (new \GGD\AFAS\SOAP\Requests\createPerson(resolve('SOAPPostRequest'), $formData))->create();

        if (empty($person)) {
            throw new \Exception(sprintf('AFAS error: could not create person (%s).', $formData->email()));
        }

        return $person;
    }

    protected function createSubject(Person $person, FormData $formData): string
    {
        try {
            $subject = (new \GGD\AFAS\SOAP\Requests\createSubject(resolve('SOAPPostRequest'), $person, $formData))->create();
        } catch (\Exception $e) {
            $this->teams->addRecord('error', 'GGD klachtenformulier', [
                'message' => sprintf('AFAS error: could not create a subject on behalf of person (%s). Error: %s', $formData->email(), $e->getMessage())
            ]);
            return '';
        }

        return !empty($subject['SbId']) ? $subject['SbId'] : '';
    }
}
