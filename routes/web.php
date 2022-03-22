<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConsulterTicketDemandeur;
use App\Http\Controllers\ConsulterTicketDemandeurController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('login',[LoginController::class,"displayLogin"])->name("login.view");
Route::post('login',[LoginController::class,"login"])->name("login");

Route::get('logout',[LoginController::class,"logout"])->name("logout");


Route::middleware("auth")->group(function(){
    Route::get('vueDemandeur',[ConsulterTicketDemandeurController::class,"displayConsulterTicket"])->name("vueDemandeur");
    Route::get('/',[AccueilController::class,"displayAccueil"]);
    Route::get('accueil',[AccueilController::class,"displayAccueil"])->name("accueil");
    Route::get('ajouterTicket', [TicketController::class,"displayFormTicket"])->name('ajouterTicket');
    
    Route::post('ajouterTicket', [TicketController::class,"creerTicket"])->name("insertTicket");
    
    Route::get('modifierTicket/{id}',[TicketController::class,"displayModifierTicket"])->name("modifierTicket");
    Route::get('fermerTicket/{id}&{sta_id}',[TicketController::class,"closeTicket"])->name("fermerTicket");
    Route::get('redirigerTicket/{tic_id}&{ope_id}',[TicketController::class,"redirectTicket"])->name("redirigerTicket");
    
    Route::post('modifierTicket',[TicketController::class,"updateTicket"])->name("doModifierTicket");
    
    Route::get('stats', [StatistiqueController::class, "displayStatistique"])->name('stats');
    Route::post('stats', [StatistiqueController::class, "displayStatistique"])->name('stats');
    
    
    Route::get('rediriger/{id}',[TicketController::class, "displayRediriger"])->name('rediriger');
    
    
    Route::get('displayNotification',[NotificationController::class, "displayNotification"])->name('displayNotification');
    
    Route::get('deleteNotif/{not_id}',[NotificationController::class,"deleteNotif"])->name('deleteNotif');
});







