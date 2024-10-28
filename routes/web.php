<?php

use App\Livewire\OrganizationCreate;
use App\Livewire\OrganizationEdit;
use App\Livewire\OrganizationsTable;
use Illuminate\Support\Facades\Route;

Route::get('/organizations', OrganizationsTable::class)->name('organizations.index');
/*Route::get('/organizations/{organization}/edit', OrganizationEdit::class)->name('organizations.edit');
Route::get('/organizations/create', OrganizationCreate::class)->name('organizations.create');*/
