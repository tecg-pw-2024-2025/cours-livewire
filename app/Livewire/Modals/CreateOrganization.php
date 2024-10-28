<?php

namespace App\Livewire\Modals;

use App\Exceptions\OrganizationException;
use App\Livewire\Forms\OrganizationForm;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class CreateOrganization extends Component
{
    public OrganizationForm $form;

    public string $feedback = '';

    public function save(): void
    {
        try {
            $this->form->store();
        } catch (OrganizationException $e) {
            $this->dispatch($e->getMessage());
            throw ValidationException::withMessages($e->getPrevious()?->errors());
        }

        $this->form->reset();

        $this->feedback = 'Organization created successfully';

        $this->dispatch('organization-saved');
    }

    public function render()
    {
        return view('livewire.modals.create-organization');
    }
}
