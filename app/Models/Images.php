<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Images extends Model
{
    use HasFactory, SoftDeletes;

    protected $table    = 'imagenes';

    public function galeria()
    {
        return $this->belongsTo(Galeria::class);
    }

}
