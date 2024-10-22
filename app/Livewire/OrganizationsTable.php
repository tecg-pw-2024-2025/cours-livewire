<?php

namespace App\Livewire;

use App\Models\Account;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class OrganizationsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $search_button = false;
    public $sortField = 'name';
    public $sortDirection = 'asc';

    #[Computed]
    public function organizations(): LengthAwarePaginator|array
    {
        return Account::whereName('Acme Corporation')->first()
            ->organizations()
            ->filter(['search' => $this->search])
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);
    }

    public function sort($field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }
}
