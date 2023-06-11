<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'idPista',
        'idUser',
        'disponible',
        'hora',
        'luz',
    ];
}
