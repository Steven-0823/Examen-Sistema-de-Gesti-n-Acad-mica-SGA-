<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripciones extends Model
{
    use HasFactory;
    protected $table='_inscripciones';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
