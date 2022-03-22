<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public $user_type ="role";

    use HasFactory;

    protected $primaryKey = 'rol_id';

    protected $fillable = ['rol_libelle'];

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
