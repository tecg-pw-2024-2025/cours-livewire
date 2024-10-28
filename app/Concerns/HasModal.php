<?php

namespace App\Concerns;

use Livewire\Attributes\Session;

trait HasModal
{
    public string $childName = '';
    public array $childPayload = [];

    public function openModal(string $childName, array $payload = [])
    {
        $this->childName = 'modals.'.$childName;
        $this->childPayload = $payload;
        //$this->dispatch('modal-open', $this->childName, $payload);
    }

    public function closeModal()
    {
        $this->childName = '';
    }
}
