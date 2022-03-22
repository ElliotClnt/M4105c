<?php

namespace App\Http\Controllers;

use App\Models\Probleme;
use App\Models\Statut;
use App\Models\Ticket;
use App\Models\User;
use App\Models\TypeProbleme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ConsulterTicketDemandeurController extends Controller
{
    public function displayConsulterTicket(Request $request)
    {
        $request->validate([
            "order_by_value" => ["nullable", "string"],
            "order_by" => ["nullable", "in:DESC,ASC"],
            "sta_ids" => ["nullable", "array"],
            "sta_ids.*" => ["exists:statuts,sta_id"],
            "pro_ids" => ["nullable", "array"],
            "pro_ids.*" => ["exists:type_problemes,typ_id"]
        ]);

        $ticket = Ticket::where(function ($query) use ($request) {
            if (isset($request->sta_ids)) {
                $query->whereIn("sta_id", $request->sta_ids);
            }
            if(isset($request->pro_ids)) {
                $query->whereHas('probleme', function($query) use ($request) {
                    $query->whereIn("typ_id", $request->pro_ids);
                }); 
            }
        })->orderBy(
            isset($request->order_by_value) ? $request->order_by_value : "created_at",
            isset($request->order_by) ? $request->order_by : "DESC",
        )->get();

        return Inertia::render("vueDemandeur", ["tickets" => $ticket, "problemes" => Probleme::all(), "type_problemes" => TypeProbleme::all(), "statuts" => Statut::all(), "user" => Auth::user(),]);
    }

    
}
