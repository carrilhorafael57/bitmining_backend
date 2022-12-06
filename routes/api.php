<?php

use App\Http\Controllers\MinerStatController;
use App\Http\Controllers\UserController;
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

//User Routes
Route::post('/check-user', [UserController::class, 'checkUser']);
Route::post('/load-inventory',[UserController::class, 'loadInventory']);

//Miner routes
Route::post('/miner-inventory', [MinerStatController::class, 'allMiners']);
Route::post('/new-miner', [MinerStatController::class, 'mintMiner']);
Route::post('/miner-start', [MinerStatController::class, 'startMining']);
Route::post('/miner-finished', [MinerStatController::class, 'receiveOre']);
Route::post('/miner-boost', [MinerStatController::class, 'boost']);
Route::post('/mining-timecheck', [MinerStatController::class, 'checkMiningTimeLeft']);