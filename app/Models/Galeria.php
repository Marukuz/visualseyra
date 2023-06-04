<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galeria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table    = 'galerias';

    protected $fillable=['id','nombre','image'];

    public function imagenes()
    {
        return $this->hasMany(Images::class);
    }

}
