<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Probleme extends Model
{
    use HasFactory;

    protected $primaryKey = 'pro_id';

    protected $fillable = ['typ_id','pro_libelle'];

    protected $with=['type_probleme'];

    public function type_probleme(){
        return $this->belongsTo(TypeProbleme::class,'typ_id','typ_id');
    }
}
