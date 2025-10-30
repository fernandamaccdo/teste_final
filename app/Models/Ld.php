<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ld extends Model
{
    protected $table = 'ld';
    public $timestamps = false;

    protected $fillable = [
        'publicacao_id',
        'like_',
        'deslike_',
        'user_id'
    ];

    protected $casts = [
        'like_' => 'integer',
        'deslike_' => 'integer',
        'publicacao_id' => 'integer',
        'user_id' => 'integer',
    ];

    
    public function publicacao()
    {
        return $this->belongsTo(Publicacao::class, 'publicacao_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}



