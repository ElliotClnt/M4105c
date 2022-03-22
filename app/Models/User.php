<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    public $timestamps = true;
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'rol_id',
        'email',
        'password',
        'dom_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with=['role','domaine_competences'];

    public function role(){
        return $this->belongsTo(Role::class,'rol_id','rol_id');
    }

    public function domaine_competences(){
        return $this->belongsToMany(DomaineCompetence::class,'operateur_domaines','id','dom_id')->withTimestamps();
    }

    public function tickets(){
        return $this->hasMany(Ticket::class,"ope_id","id");
    }

}
