<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomaineCompetence extends Model
{
    use HasFactory;

    protected $primaryKey= 'dom_id';

    protected $fillable=['dom_libelle'];

    protected $with=['type_probleme'];

    public function type_probleme(){
        return $this->belongsTo(TypeProbleme::class,"dom_id","dom_id");
    }

    public function users(){
        return $this->morphedByMany(User::class,'operateur_domaines','id','id');
    }

    

}
