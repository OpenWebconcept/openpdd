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
        return trim($this->data['firstName'] ?? '');
    }

    public function lastNamePrefix(): string
    {
        return trim($this->data['lastNamePrefix'] ?? '');
    }

    public function lastName(): string
    {
        return trim($this->data['lastName'] ?? '');
    }

    public function gender(): string
    {
        return trim($this->data['gender'] ?? '');
    }

    public function street(): string
    {
        return trim($this->data['street'] ?? '');
    }

    public function housenumber(): string
    {
        return trim($this->data['housenumber'] ?? '');
    }

    public function city(): string
    {
        return trim($this->data['city'] ?? '');
    }

    public function postalCode(): string
    {
        return $this->removeSpaces($this->data['postalCode'] ?? '');
    }

    public function email(): string
    {
        return $this->removeSpaces($this->data['email'] ?? '');
    }

    public function phonenumber(): string
    {
        return $this->removeSpaces($this->data['phonenumber'] ?? '');
    }

    public function complaint(): string
    {
        return $this->data['complaint'] ?? '';
    }

    protected function removeSpaces(string $value): string
    {
        return str_replace(' ', '', trim($value));
    }
}
