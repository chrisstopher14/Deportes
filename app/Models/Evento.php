<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable=['deporte_id', 'nombreDeporte'];

    public function deportes(){
        return $this->hasMany('App\Models\Deporte', 'deporte_id', 'id');
        }
}
