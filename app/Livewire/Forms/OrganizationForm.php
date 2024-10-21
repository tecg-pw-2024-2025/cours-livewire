<?php

namespace App\Livewire\Forms;

use App\Models\Organization;
use Livewire\Form;

class OrganizationForm extends Form
{
    public ?Organization $organization = null;
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $address = '';
    public string $city = '';
    public string $region = '';
    public string $country = '';
    public string $postal_code = '';

    public function setOrganization(Organization $organization): void
    {
        $this->organization = $organization;

        $this->name = $organization->name;
        $this->email = $organization->email;
        $this->phone = $organization->phone;
        $this->address = $organization->address;
        $this->city = $organization->city;
        $this->region = $organization->region;
        $this->country = $organization->country;
        $this->postal_code = $organization->postal_code;
    }

    public function store(): void
    {
        $this->validate();

        Organization::create($this->all());
    }

    public function update(): void
    {
        $this->validate();

        $this->organization->update(
            $this->all()
        );
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['email', 'max:255'],
            'phone' => ['max:255'],
            'address' => ['max:255'],
            'city' => ['max:255'],
            'region' => ['max:255'],
            'country' => ['in:US,CA'],
            'postal_code' => ['max:255'],
        ];
    }
}
