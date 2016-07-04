<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'servico';

    protected $fillable = [
        'nome',
    ];

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cidade() {
        return $this->belongsTo(\App\Cidade::class);
    }
}
