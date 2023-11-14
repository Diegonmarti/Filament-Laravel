<?php

use Filament\Filament;
use Filament\Forms\Http\Controllers\FormAttachmentController;
use Filament\Http\Controllers;
use Filament\Http\Livewire;
use Filament\Http\Middleware\AuthorizeAdmins;
use Illuminate\Routing\Middleware\ValidateSignature;
use Illuminate\Support\Facades\Route;

Route::name('filament.')
    ->middleware(config('filament.middleware.base'))
    ->domain(config('filament.domain'))
    ->prefix(config('filament.path'))
    ->group(function () {
        Route::get('assets/{path}', Controllers\AssetController::class)->where('path', '.*')->name('asset');

        // Authentication
        Route::middleware(config('filament.middleware.guest'))->name('auth.')->group(function () {
            Route::get('login', Livewire\Auth\Login::class)->name('login');
            Route::get('forgot-password', Livewire\Auth\RequestPassword::class)->name('password.request');
            Route::get('reset-password/{token}', Livewire\Auth\ResetPassword::class)->middleware([ValidateSignature::class])->name('password.reset');
        });

        // Images
        Route::get('image/{path}', Controllers\ImageController::class)->where('path', '.*')->name('image');

        // Authenticated routes
        Route::middleware(config('filament.middleware.auth'))->group(function () {
            foreach (Filament::getPages() as $page) {
                Route::get($page::route()->uri, $page)->name('pages.' . $page::route()->name);
            }

            Route::get('/', Livewire\Dashboard::class)->name('dashboard');
            Route::get('account', Livewire\EditAccount::class)->name('account');

            Route::post('form-attachments', FormAttachmentController::class)->name('form-attachments.upload');

            foreach (Filament::getResources() as $resource) {
                foreach ($resource::router()->routes as $route) {
                    Route::get('resources/' . $resource::getSlug() . '/' . $route->uri, $route->page)
                        ->name('resources.' . $resource::getSlug() . '.' . $route->name);
                }
            }

            Route::middleware(AuthorizeAdmins::class)->group(function () {
                foreach (Filament::userResource()::router()->routes as $route) {
                    Route::get(Filament::userResource()::getSlug() . '/' . $route->uri, $route->page)
                        ->name(Filament::userResource()::getSlug() . '.' . $route->name);
                }
            });
        });
    });
