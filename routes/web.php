<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/test1", function(){
    return view("test1");
});

Route::get("/test2", function(){
    return view("test2");
});


Route::middleware("auth")->group(function(){
});


Route::middleware("auth")->group(function(){
    Route::get("/logout", [UserController::class, "logout"]);
});

Route::get("/mailable", function(){
});

Route::get("/pointHistories", [\App\Http\Controllers\PointHistoryController::class, "index"]);

Route::middleware("auth")->group(function(){
    Route::patch("/users/template", [UserController::class, "updateTemplate"]);
    Route::post("/readHistories", [\App\Http\Controllers\ReadHistoryController::class, "store"]);

    Route::post("/newspapers", [\App\Http\Controllers\NewspaperController::class, "store"]);
    Route::delete("/newspapers", [\App\Http\Controllers\NewspaperController::class, "destroy"]);
    Route::patch("/newspapers/{newspaper}/next", [\App\Http\Controllers\NewspaperController::class, "next"]);
    Route::patch("/newspapers/{newspaper}/prev", [\App\Http\Controllers\NewspaperController::class, "prev"]);

    Route::post("/answers", [\App\Http\Controllers\AnswerController::class, "store"]);

    Route::get("/curations", [\App\Http\Controllers\CurationController::class, "index"]);
    Route::post("/curations", [\App\Http\Controllers\CurationController::class, "store"]);
    Route::delete("/curations", [\App\Http\Controllers\CurationController::class, "destroy"]);

    Route::get("/questions", [\App\Http\Controllers\QuestionController::class, "index"]);

    Route::get("/readHistories", [\App\Http\Controllers\ReadHistoryController::class, "index"]);
});
Route::get("/curations/{curation}", [\App\Http\Controllers\CurationController::class, "show"]);
Route::get("/answers/create", [\App\Http\Controllers\AnswerController::class, "create"]);


Route::middleware("guest")->group(function(){
    Route::get("/login", [UserController::class, "loginForm"])->name("login");
    Route::post("/login", [UserController::class, "login"]);
    Route::post("/register", [UserController::class, "register"]);
    // Route::resource("/users", \App\Http\Controllers\UserController::class);
});

