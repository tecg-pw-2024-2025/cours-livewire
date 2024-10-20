<?php

namespace App\Livewire;

use App\Models\Account;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class OrganizationsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $search_button = false;

    #[Computed]
    public function organizations()
    {
        return Account::whereName('Acme Corporation')->first()
            ->organizations()
            ->filter(['search' => $this->search])
            ->orderBy('name')
            ->paginate(10);
    }
}
