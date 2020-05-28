<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Dottd\NovaAlgolia\Http\AlgoliaIndiciesController;
use Dottd\NovaAlgolia\Http\AlgoliaOperationsController;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('/algolia/indicies', AlgoliaIndiciesController::class . '@index');
Route::get('/algolia/operations', AlgoliaOperationsController::class . '@index');
