<?php

namespace App\Http\Controllers;

use App\Models\Probleme;
use App\Models\Ticket;
use App\Models\TypeProbleme;
use App\Models\Statut;
use App\Models\User;
use App\Models\DomaineCompetence;
use App\Models\Notif;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Ramsey\Uuid\Type\Integer;
use SebastianBergmann\Environment\Console;

use function PHPUnit\Framework\equalToCanonicalizing;
use function PHPUnit\Framework\isEmpty;

class TicketController extends Controller{
    public function displayFormTicket(Request $request){
        //dd(User::withCount('tickets')->find(2));
        return Inertia::render("ajouterTicket",["type_problemes"=>TypeProbleme::all(),"problemes"=>Probleme::all()]);
    }

    public function creerTicket(Request $request){


        $validator = Validator::make($request->all(),[
            'tic_titre' => ['required'],
            'tic_description' => ['required'],
            'tic_numposte'=>['required'],
            'tic_importance'=>['required'],
            'pro_id'=>['required']
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        /*
        $validateData = $request->validate([
            'tic_titre' => ['required'],
            'tic_description' => ['required'],
            'tic_numposte'=>['required'],
            'tic_importance'=>['required'],
            'pro_id'=>['required']
        ]);
        */
            //Ticket::create($validateData); 




            $users = User::all();

            $ope_competent = [];
            foreach($users as $user){
                if($user->rol_id!=1){
                    foreach($user->domaine_competences as $domaine){
                        if($domaine->dom_id == $request->input('selected_typProb')){
                            $ope_competent[$user->id] = $user;
                            
                        }
                    }
                }
            }
            if(empty($ope_competent)){
                $operateur=User::where('rol_id',3)->first()->id;
            }else{
                $tickets = Ticket::all();
                $ope_ticket=[];
                
                foreach($ope_competent as $ope){
                    $nbTicket = 0;
                    foreach($tickets as $ticket){
                        if($ticket->operateur->id == $ope->id){
                            $nbTicket++;
                        }
                        $ope_ticket[$ope->id] = $nbTicket;
                    }
                }


                if($ope_ticket==[]){
                    $operateur=array_shift($ope_competent)->id;
                }else{
                    $operateur = array_search(min($ope_ticket),$ope_ticket);
                    if($ope_ticket[$operateur]>=4){
                        $operateur=User::where('rol_id',3)->first()->id;
                    }
                }

            }


            $t= new Ticket();
            $t->id = Auth::user()->id;
            $t->ope_id = $operateur;
            $t->sta_id = 1;
            $t->pro_id= $request->input("pro_id");
            $t->tic_titre= $request->input("tic_titre");
            $t->tic_description= $request->input("tic_description");
            $t->tic_importance= $request->input("tic_importance");
            $t->tic_numposte= $request->input("tic_numposte");
            $t->tic_piecejointe= $request->input("tic_piecejointe");
            $t->tic_datecreation=Carbon::now(); 
            $t->tic_redirection=0;
            $t->save();

            return Redirect::route("vueDemandeur",["tickets"=>Ticket::all(),"problemes"=>Probleme::all(),"type_problemes"=>TypeProbleme::all(),"statuts"=>Statut::all(),'user'=>Auth::user()]);
        

        } 
    
        public function displayModifierTicket(Request $request, $id){
            return Inertia::render("modifierTicket",["type_problemes"=>TypeProbleme::all(),"problemes"=>Probleme::all(),"ticket"=>Ticket::find($id),'user'=>Auth::user()]);
        }

        public function updateTicket(Request $request){



            $validator = Validator::make($request->all(),[
                'tic_titre' => ['required'],
                'tic_description' => ['required'],
                'tic_numposte'=>['required'],
                'tic_importance'=>['required'],
                'pro_id'=>['required']
            ]);
            if($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }


            $ticket=Ticket::find($request->input("tic_id"));
            $ticket->tic_titre= $request->input("tic_titre");
            $ticket->tic_description= $request->input("tic_description");
            $ticket->tic_importance= $request->input("tic_importance");
            $ticket->tic_numposte= $request->input("tic_numposte");
            $ticket->tic_piecejointe= $request->input("tic_piecejointe");
            $ticket->pro_id= $request->input("pro_id");
            

            if($request->input('tic_dateresolution')!=$ticket->tic_dateresolution){
                
                $notification = new Notif();
                $notification->id = $ticket->id;
                $notification->not_titre="Date résolution modifié !";
                $notification->not_date = Carbon::now();
                
                if($ticket->tic_dateresolution==null){
                    $notification->not_description = "Une date de résolution a été fixé à ".$this->dateFR($request->input('tic_dateresolution'))."au problème : \"".$ticket->tic_titre."\"";
                }else{
                    $notification->not_description = "La date de résolution de votre ticket : \"".$ticket->tic_titre."\" a été modifiée au ".$this->dateFR($request->input('tic_dateresolution'));
                }
                
                $notification->save();
            }
            $ticket->tic_dateresolution = $request->input('tic_dateresolution');

            $ticket->save();
            return Redirect::route("vueDemandeur",["tickets"=>Ticket::all(),"problemes"=>Probleme::all(),"type_problemes"=>TypeProbleme::all(),"statuts"=>Statut::all(),'user'=>Auth::user()]);
        }

        public function closeTicket(Request $request, $id,$sta_id){

            $ticket = Ticket::find($id);

            $notification = new Notif();
            $notification->id = $ticket->id;
            $notification->not_titre = "Ticket Fermé !";
            $notification->not_date = Carbon::now();
            if($sta_id == 2){

                $notification->not_description = "Votre problème \"".$ticket->tic_titre."\" a été résolu";
            }elseif($sta_id == 3){
                $notification->not_description = "Votre problème \"".$ticket->tic_titre."\" n'a pas été résolu";
            }

            $notification->save();


            $ticket->sta_id = $sta_id;
            $ticket->tic_dateresolution = Carbon::now();

            $ticket->save();
            return Redirect::route("vueDemandeur",["tickets"=>Ticket::all(),"problemes"=>Probleme::all(),"type_problemes"=>TypeProbleme::all(),"statuts"=>Statut::all(),'user'=>Auth::user()]);
           // return Inertia::render()
        }

        public function redirectTicket(Request $request, $tic_id, $ope_id){
            $ticket = Ticket::find($tic_id);
            $ope = User::where("id",$ope_id)->first();

            $isCompetent = false;

            if($ope->rol_id == 3){
                $isCompetent = true;
            }


            foreach($ope->domaine_competences as $domaine){
                if($domaine->type_probleme->typ_id == $ticket->probleme->typ_id){
                    $isCompetent=true;
                }
            }

            if($ticket->tic_redirection >= 3 || $isCompetent==false){
                $operateur=User::where('rol_id',3)->first()->id;
            }else{
                $operateur=$ope_id;
            }
            $ticket->ope_id = $operateur;
            $ticket->tic_redirection = $ticket->tic_redirection+1;
            $ticket->save();

            return Redirect::route("vueDemandeur",["tickets"=>Ticket::all(),"problemes"=>Probleme::all(),"type_problemes"=>TypeProbleme::all(),"statuts"=>Statut::all(),'user'=>Auth::user()]);
        }

        public function displayRediriger(Request $request, $id){
            return Inertia::render("rediriger",["ticket"=>Ticket::find($id),'user'=>Auth::user(),'operateurs'=>User::withCount('tickets')->get()]);
        }

        public function dateFR($datetime) {
            setlocale(LC_ALL, 'fr_FR');
            return strftime('%d %B %Y',strtotime($datetime));
        }
       


}