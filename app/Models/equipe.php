<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'idEquipe',
        'nomeEquipe',
        'logo',
    ];
}
