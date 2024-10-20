<?php

use Illuminate\Support\Facades\Route;

Route::get('/organizations', function () {
    $account = App\Models\Account::whereName('Acme Corporation')->first();

    $organizations = $account
        ->organizations()
        ->orderBy('name')
        ->paginate(10);

    return view('Organisations.index', compact('organizations'));
})->name('home');

Route::get('/organizations/{organization}/edit', function (App\Models\Organization $organization) {
    $organization->load('contacts');

    return view('Organisations.edit', compact('organization'));
})->name('organizations.edit');
