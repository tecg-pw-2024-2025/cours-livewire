<?php

namespace App\Livewire\Forms;

use App\Exceptions\OrganizationException;
use App\Models\Organization;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;


class OrganizationForm extends Form
{

    public ?Organization $organization = null;

    #[Validate]
    public string $name = '';

    #[Validate]
    public string $email = '';

    #[Validate]
    public string $phone = '';

    #[Validate]
    public string $address = '';

    #[Validate]
    public string $city = '';

    #[Validate]
    public string $region = '';

    #[Validate]
    public string $country = '';

    #[Validate]
    public string $postal_code = '';

    public string $account_id = '1';

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
        try {
            $this->validate();
        } catch (ValidationException $exception) {
            throw new OrganizationException('invalid-data-for-organization', 0, $exception);
        }
        Organization::create($this->all());
    }

    /**
     * @throws OrganizationException
     */
    public function update(): void
    {
        try {
            $this->validate();
        } catch (ValidationException $exception) {
            throw new OrganizationException('invalid-data-for-organization', 0, $exception);
        }

        $this->organization->update(
            $this->all()
        );
    }

    public function rules(): array
    {
        $countries = implode(',', array_keys(config('organisations')));

        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'max:50'],
            'phone' => ['nullable', 'max:50'],
            'address' => ['nullable', 'max:150'],
            'city' => ['nullable', 'max:50'],
            'region' => ['nullable', 'max:50'],
            'country' => ['nullable', 'in:'.$countries],
            'postal_code' => ['nullable', 'max:25'],
        ];
    }
}
