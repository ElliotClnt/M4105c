<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Inertia\Inertia;


class StatistiqueController extends Controller
{
    public function displayStatistique(){

      $allTickets = Ticket::count();
      $allSolvedTickets = Ticket::where('sta_id', '2')->count();
      $allWaitingTickets = Ticket::where('sta_id','1')->count();
      $allNotSolvedTickets = Ticket::where('sta_id','3')->count();
      $problemeLogiciel = Ticket::whereHas('probleme', function ($query) {
        $query->where('typ_id', '1');
      })->count();
      $problemeMateriel = Ticket::whereHas('probleme', function ($query) {
        $query->where('typ_id', '2');
      })->count();
      $problemeUtilisateur = Ticket::whereHas('probleme', function ($query) {
        $query->where('typ_id', '3');
      })->count();
      return Inertia::render("stats",["allTickets" => $allTickets,"allSolvedTickets" => $allSolvedTickets,"allWaitingTickets" => $allWaitingTickets,"allNotSolvedTickets" => $allNotSolvedTickets,"problemeLogiciel" => $problemeLogiciel, "problemeMateriel" => $problemeMateriel, "problemeUtilisateur" => $problemeUtilisateur]);
    
    }


}
