<?php
// routes/api.php
// routes/api.php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// API route to create an invoice
Route::post('/invoices', [InvoiceController::class, 'store']);

// API route to get all invoices
Route::get('/invoices', [InvoiceController::class, 'index']);

// API route to search invoices
Route::get('/invoices/search', [InvoiceController::class, 'search']);

// API route to mark invoice as paid
Route::patch('/invoices/{id}/pay', [InvoiceController::class, 'markAsPaid']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/invoices', [InvoiceController::class, 'store']);
    Route::get('/invoices', [InvoiceController::class, 'index']);
    Route::get('/invoices/search', [InvoiceController::class, 'search']);
    Route::patch('/invoices/{id}/pay', [InvoiceController::class, 'markAsPaid']);
    Route::patch('/invoices/{id}/Unpay', [InvoiceController::class, 'markAsUnPaid']);
    Route::delete('/invoices/{id}', [InvoiceController::class, 'destroy']);
});


Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'register']);

