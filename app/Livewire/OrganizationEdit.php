<?php

namespace App\Livewire;

use App\Livewire\Forms\OrganizationForm;
use App\Models\Organization;
use Livewire\Component;

class OrganizationEdit extends Component
{
    public ?Organization $organization;

    public OrganizationForm $form;

    public string $feedback = '';

    public function mount($organization): void
    {
        $this->form->setOrganization($organization);
    }

    public function save(): void
    {
        $this->form->update();

        $this->feedback = 'Organization updated successfully';

        $this->dispatch('organization-saved');
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $this->organization->load('contacts');

        return view('livewire.organization-edit');
    }

}
