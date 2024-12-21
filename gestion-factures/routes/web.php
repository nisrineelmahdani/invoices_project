<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
Route::get('/clients', [ClientController::class, 'show'])->name('invoices.indexClients');
Route::get('/products', [ProductController::class, 'index'])->name('invoices.indexProducts');
Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
// Using route model binding to automatically resolve the invoice model
Route::get('/invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
Route::put('/invoices/{/invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
Route::get('/download/{id}', [InvoiceController::class, 'download'])->name('invoice.download');

Route::get('/invoices/view/{id}', [InvoiceController::class, 'view'])->name('invoices.view');
