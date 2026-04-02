<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'titulo',
        'descricao',
        'status',
        'prioridade',
        'data_entrega',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}