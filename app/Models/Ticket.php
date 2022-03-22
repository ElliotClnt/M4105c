<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $primaryKey = 'tic_id';

    protected $fillable = ['id','ope_id','sta_id','pro_id','tic_titre','tic_description','tic_importance','tic_numposte','tic_datecreation','tic_dateresolution','tic_piecejointe','tic_redirection'];

    protected $with=['statut','probleme','user','operateur'];

    public function probleme(){
        return $this->belongsTo(Probleme::class,'pro_id','pro_id');
    }

    public function statut(){
        return $this->belongsTo(Statut::class,'sta_id','sta_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'id','id');
    }

    public function operateur(){
        return $this->belongsTo(User::class,'ope_id','id');
    }
}
