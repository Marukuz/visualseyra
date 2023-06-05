<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    static $rules=[
        'title'=>'required',
        'descripcion'=>'required',
        'start'=>'required', 
        'end'=>'required',
    ];

    protected $fillable=['title','descripcion','fecha','start','end','user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
}
