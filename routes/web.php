<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::post('locale', function (Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'locale' => ['required', 'string', 'in:' . implode(',', config('app.supported_locales', ['ar', 'en']))],
    ]);

    session(['locale' => $validated['locale']]);

    return back();
})->name('locale.switch');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::livewire('admin/settings', 'pages::admin.settings')->name('admin.settings');
    Route::livewire('admin/branches', 'pages::admin.branches')->name('admin.branches');
    Route::livewire('admin/stores', 'pages::admin.stores')->name('admin.stores');
    Route::livewire('admin/cash-drawers', 'pages::admin.drawers')->name('admin.cash-drawers');
    Route::livewire('admin/authorization-baseline', 'pages::admin.authorization-baseline')->name('admin.authorization-baseline');

    Route::livewire('admin/system/health', 'pages::system.health')->name('system.health');
    Route::livewire('admin/system/ui-showcase', 'pages::system.ui-showcase')->name('system.ui-showcase');
    Route::view('system/app', 'pages.system.app')->name('system.app');
    Route::view('pos', 'pages.pos.index')->name('pos');
});

Route::get('forbidden', function () {
    return response()->view('errors.403', [], 403);
})->name('forbidden');

require __DIR__.'/settings.php';
