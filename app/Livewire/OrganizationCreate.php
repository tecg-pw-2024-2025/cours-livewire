<?php

namespace App\Livewire;

use App\Exceptions\OrganizationException;
use App\Livewire\Forms\OrganizationForm;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class OrganizationCreate extends Component
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

    public function render(): View|Factory|Application|\Illuminate\View\View
    {
        return view('livewire.organization-create');
    }
}
