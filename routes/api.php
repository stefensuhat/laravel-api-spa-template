<?php

use Illuminate\Support\Facades\Route;

Route::get('models', [\App\Http\Controllers\AiModelController::class, 'index']);
