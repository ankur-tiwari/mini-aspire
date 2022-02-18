<?php

use App\Http\Controllers\ApplyLoanController;
use App\Http\Controllers\LoanRepaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auth routes

require __DIR__ . '/auth.api.php';

// Loan application routes

Route::post('loan-applications/{loan_application_id}/approve', [
    ApplyLoanController::class, 'approve'
]);
Route::apiResource('apply-loan', ApplyLoanController::class);

// Loan repayments

Route::get('loan-applications/{loan_application_id}/repayments', [
    LoanRepaymentController::class, 'index'
]);
Route::post('loan-repayments/{loan_repayment_id}/repay', [
    LoanRepaymentController::class, 'repay'
]);
