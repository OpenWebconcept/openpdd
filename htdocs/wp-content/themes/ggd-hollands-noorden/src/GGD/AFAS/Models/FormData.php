<?php

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
        return $this->data['firstName'] ?? '';
    }

    public function lastNamePrefix(): string
    {
        return $this->data['lastNamePrefix'] ?? '';
    }

    public function lastName(): string
    {
        return $this->data['lastName'] ?? '';
    }

    public function gender(): string
    {
        return $this->data['gender'] ?? '';
    }

    public function street(): string
    {
        return $this->data['street'] ?? '';
    }

    public function housenumber(): string
    {
        return $this->data['housenumber'] ?? '';
    }

    public function city(): string
    {
        return $this->data['city'] ?? '';
    }

    public function postalCode(): string
    {
        return $this->data['postalCode'] ?? '';
    }

    public function email(): string
    {
        return $this->data['email'] ?? '';
    }

    public function phonenumber(): string
    {
        return $this->data['phonenumber'] ?? '';
    }

    public function complaint(): string
    {
        return $this->data['complaint'] ?? '';
    }
}
