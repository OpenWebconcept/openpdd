<?php

namespace GGD\AFAS\Models;

class Person
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function fullName(): string
    {
        return $this->data['Naam'] ?? '';
    }

    public function firstName(): string
    {
        return $this->data['Voornaam'] ?? '';
    }

    public function lastName(): string
    {
        return $this->data['Achternaam'] ?? '';
    }

    public function emailPrivate(): string
    {
        return $this->data['E-mail_prive'] ?? '';
    }

    public function organizationPersonCode(): string
    {
        return $this->data['Organisatie_persoon_code'] ?? '';
    }

    public function bcCo(): string
    {
        return $this->data['BcCo'] ?? '';
    }

    public function bcId(): string
    {
        return $this->data['BcId'] ?? '';
    }

    public static function makeFrom(array $data): self
    {
        return new static($data);
    }
}
