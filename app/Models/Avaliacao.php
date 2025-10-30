<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'avaliacao';

    public $timestamps = false;

    protected $fillable = [
        'usuario_id',
        'publicacao_id',
        'comentario',
        'nota'
    ];

    // cada avaliação pertence a uma publicação
    public function publicacao()
    {
        return $this->belongsTo(Publicacao::class, 'publicacao_id');
    }

    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
