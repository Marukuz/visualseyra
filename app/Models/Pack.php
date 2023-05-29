<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Service;


class Pack extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'packs';
    protected $fillable = ['servicio_id', 'nombre', 'contenido', 'precio'];

    public function servicio()
    {
        return $this->belongsTo(Service::class);
    }
}
