<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    
    protected $table = 'usuarios';
  
    protected $fillable = [
        'primeiro_nome',
        'ultimo_nome',
        'email',
        'cidade',
        'estado',
        'imagem',
        'usuario',
        'senha'
    ];

    protected $primaryKey = 'id'; 
    public $timestamps = false;
}
