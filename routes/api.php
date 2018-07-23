<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sms', function () {
    return 'Hello You!';
});

//User
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
Route::get('/users', 'UserController@getUsers');
Route::get('/users/{id}', 'UserController@getUser');
//Route::get('/dashboard', 'UserController@viewDashboard');

//User Account
Route::post('/addAccount', 'UserAccountController@addUserAccount');
Route::get('/userAccounts', 'UserAccountController@getUserAccounts');
Route::get('/userAccounts/{id}', 'UserAccountController@getUserAccount');
Route::get('/userAccount/{account_number}', 'UserAccountController@getAccountsByAccountNumber');
Route::get('/allUserAccounts/{user_id}', 'UserAccountController@getAccountsByUserId');

//Transaction
Route::post('/newTransaction', 'TransactionController@createTransaction');
Route::get('/transactions', 'TransactionController@getTransactions');
Route::get('/transactions/{service}{id}', 'TransactionController@getTransaction');
Route::get('/allUserTransactions/{user_id}', 'TransactionController@getTransactionsByUserId');


//Beneficiary
Route::post('/newBeneficiary', 'BeneficiaryController@createBeneficiary');
Route::get('/beneficiaries/{id}', 'BeneficiaryController@getBeneficiary');
Route::get('/allUserBeneficiaries/{user_id}', 'BeneficiaryController@getBeneficiariesByUserId');

//Country
Route::post('/newCountry', 'CountryController@addCountry');
Route::get('/countries', 'CountryController@getCountries');
Route::get('/countries/{id}', 'CountryController@getCountry');

//Rate
Route::post('/newRate', 'RateController@addRate');
Route::post('/rates', 'RateController@getRate');
