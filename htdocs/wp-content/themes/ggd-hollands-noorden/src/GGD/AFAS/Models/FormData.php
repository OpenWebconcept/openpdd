<?php declare(strict_types=1);

namespace GGD\AFAS\Models;

class FormData
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function firstName(): string
    {
        $firstName = $this->data['firstName'] ?? '';

        return $this->removeSpaces($firstName);
    }

    public function lastNamePrefix(): string
    {
        $lastNamePrefix = $this->data['lastNamePrefix'] ?? '';

        return $this->removeSpaces($lastNamePrefix);
    }

    public function lastName(): string
    {
        $lastName = $this->data['lastName'] ?? '';

        return $this->removeSpaces($lastName);
    }

    public function gender(): string
    {
        $gender = $this->data['gender'] ?? '';

        return $this->removeSpaces($gender);
    }

    public function street(): string
    {
        $street = $this->data['street'] ?? '';

        return $this->removeSpaces($street);
    }

    public function housenumber(): string
    {
        $housenumber = $this->data['housenumber'] ?? '';

        return $this->removeSpaces($housenumber);
    }

    public function city(): string
    {
        $city = $this->data['city'] ?? '';

        return $this->removeSpaces($city);
    }

    public function postalCode(): string
    {
        $postalCode = $this->data['postalCode'] ?? '';

        return $this->removeSpaces($postalCode);
    }

    public function email(): string
    {
        $email = $this->data['email'] ?? '';

        return $this->removeSpaces($email);
    }

    public function phonenumber(): string
    {
        $phonenumber = $this->data['phonenumber'] ?? '';

        return $this->removeSpaces($phonenumber);
    }

    public function complaint(): string
    {
        return $this->data['complaint'] ?? '';
    }

    protected function removeSpaces(string $value): string
    {
        return str_replace(' ', '', $value);
    }
}
