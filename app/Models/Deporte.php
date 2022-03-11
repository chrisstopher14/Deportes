<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    use HasFactory;

    public function eventos(){
    return $this->hasMany('App\Models\Evento', 'deporte_id', 'id');
    }

}

