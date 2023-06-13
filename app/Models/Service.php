<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

      /**
     * @var string
     */
    protected $table    = 'servicios';

    protected $fillable = ['nombre','descripcion','image'];

    public function packs()
    {
        return $this->hasMany(Pack::class,'servicio_id');
    }

}
