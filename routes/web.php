<?php

use App\Livewire\OrganizationEdit;
use App\Livewire\OrganizationsTable;
use Illuminate\Support\Facades\Route;

Route::get('/organizations', OrganizationsTable::class)->name('home');
Route::get('/organizations/{organization}/edit', OrganizationEdit::class)->name('organizations.edit');
