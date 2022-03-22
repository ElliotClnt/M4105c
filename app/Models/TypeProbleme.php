<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProbleme extends Model
{
    use HasFactory;

    protected $primaryKey = 'typ_id';

    protected $fillable = ['typ_libelle','dom_id'];

    /*protected $with=['domaine_competence'];

    public function domaine_competence(){
        return $this->belongsTo(DomaineCompetence::class,"dom_id","dom_id");
    }*/


}
