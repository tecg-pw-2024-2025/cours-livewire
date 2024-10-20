<?php

use Illuminate\Support\Facades\Route;

Route::get('/organizations', function () {
    return view('Organisations.index');
})->name('home');

Route::get('/organizations/{organization}/edit', function (App\Models\Organization $organization) {
    $organization->load('contacts');

    return view('Organisations.edit', compact('organization'));
})->name('organizations.edit');
