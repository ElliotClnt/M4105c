<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    use HasFactory;

    protected $primaryKey = 'not_id';

    protected $fillable = ['id','not_titre','not_description','not_date'];
}
