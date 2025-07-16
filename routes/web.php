<?php

use App\Livewire\ConfirmDelete;
use App\Livewire\EditContact;
use App\Livewire\MainComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', MainComponent::class)->name('home');
Route::get('/contact/{id}/delete', ConfirmDelete::class)->name('contact.delete');
Route::get('/contact/{id}/edit', EditContact::class)->name('contact.edit');