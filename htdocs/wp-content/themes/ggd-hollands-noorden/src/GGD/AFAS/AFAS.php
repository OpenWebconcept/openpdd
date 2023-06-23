<?php declare(strict_types=1);

namespace GGD\AFAS;

use function GGD\AFAS\Helpers\resolve;
use GGD\AFAS\Models\FormData;
use GGD\AFAS\Models\Person;

class AFAS
{
    protected TeamsLogger $logger;
    
    public function __construct()
    {
        $this->logger = $this->resolveTeams();
    }

    public function resolveTeams(): TeamsLogger
    {
        try {
            if (! function_exists('GGD\AFAS\Helpers\resolve')) {
                throw new \Exception;
            }

            return TeamsLogger::make(resolve('teams'));
        } catch (\Exception $e) {
            return TeamsLogger::make(new \Psr\Log\NullLogger());
        }
    }

    public function afterFormSubmission(array $entry, array $form): array
    {
        /**
         * Could done better, client chose the cheaper option.
         * If there are going to be more forms that should have a connection with AFAS this code needs to be rewritten.
         * Something with fetching the entries dynamically instead of harde coded IDs.
         */
        if (strtolower($form['cssClass']) === 'klachtenformulier') {
            $formData = $this->getFormDataDefaultForm($entry);
        } elseif(strtolower($form['cssClass']) === 'klachtenformulier-vt-nhn') {
            $formData = $this->getFormDataFormVtNHN($entry);
        } else {
            return $form;
        }

        $formData = new FormData($formData);

        try {
            $person = $this->getPerson($formData);
        } catch (\Exception $e) {
            $this->logger->addRecord('error', 'GGD klachtenformulier', [
                'message' => $e->getMessage()
            ]);
            $person = [];
        }

        try {
            $person = $this->handleNewPerson($formData, $person);
        } catch (\Exception $e) {
            $this->logger->addRecord('error', 'GGD klachtenformulier', [
                'message' => $e->getMessage()
            ]);
            return $form;
        }

        if (empty($person)) {
            return $form;
        }

        $subject = $this->createSubject(Person::makeFrom($person), $formData);

        if (empty($subject)) {
            $this->logger->addRecord('error', 'GGD klachtenformulier', [
                'message' => sprintf('AFAS error: could not create a subject in AFAS for person (%s).', $formData->email())
            ]);
        }

        return $form;
    }

    /**
     * Create formdata based on form with ID 1.
     */
    protected function getFormDataDefaultForm(array $entry): array
    {
        return [
            'firstName' => rgar($entry, '11.3'),
            'lastNamePrefix' => rgar($entry, '11.4'),
            'lastName' => rgar($entry, '11.6'),
            'gender' => rgar($entry, '3'),
            'street' => rgar($entry, '4.1'),
            'housenumber' => rgar($entry, '4.2'),
            'city' => rgar($entry, '4.3'),
            'postalCode' => rgar($entry, '4.5'),
            'email' => rgar($entry, '5'),
            'phonenumber' => rgar($entry, '6'),
            'complaint' => rgar($entry, '8'),
        ];
    }

    /**
     * Create formdata based on form with ID 10.
     */
    protected function getFormDataFormVtNHN(array $entry): array
    {
        return [
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
            $this->logger->addRecord('error', 'GGD klachtenformulier', [
                'message' => sprintf('AFAS error: could not create a subject on behalf of person (%s). Error: %s', $formData->email(), $e->getMessage())
            ]);
            return '';
        }

        return !empty($subject['SbId']) ? $subject['SbId'] : '';
    }
}
