<?php

namespace App\Livewire;

use App\Concerns\HasModal;
use App\Exceptions\OrganizationException;
use App\Livewire\Forms\OrganizationForm;
use App\Models\Organization;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class OrganizationEdit extends Component
{

    public ?Organization $organization;

    public OrganizationForm $form;

    public string $feedback = '';

    public function mount(Organization $organization): void
    {
        $this->form->setOrganization($organization);
    }

    public function save(): void
    {
        try {
            $this->form->update();
        } catch (OrganizationException $e) {
            $this->dispatch($e->getMessage());
            throw ValidationException::withMessages($e->getPrevious()?->errors());
        }

        $this->feedback = 'Organization updated successfully';

        $this->dispatch('organization-saved');
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        $this->organization->load('contacts');

        return view('livewire.organization-edit');
    }

}
