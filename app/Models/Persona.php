<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class Persona extends Model
{
    use HasFactory;
    protected $casts = [
        'actividades' => AsCollection::class
    ];
    protected $fillable = ['rut', 'razon_social', 'actividades'];
    public $timestamps = false;
}
