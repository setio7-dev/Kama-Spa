<?php

use App\Http\Controllers\GraphicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/graphic", [GraphicController::class, 'index']);
