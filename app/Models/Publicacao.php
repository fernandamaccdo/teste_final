<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    use HasFactory;

    protected $table = 'publicacao';

    public function avaliacoes()
{
    return $this->hasMany(Avaliacao::class, 'publicacao_id');
}

    public function likes()
    {
        return $this->hasMany(\App\Models\Ld::class, 'publicacao_id')
                    ->where('tipo', 'like');
    }

    public function deslikes()
    {
        return $this->hasMany(\App\Models\Ld::class, 'publicacao_id')
                    ->where('tipo', 'deslike');
    }

   
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }


}
