<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uredjaj extends Model
{
    use HasFactory;

    protected $table = 'uredjaji';

    protected $fillable = ['vlasnik', 'serviser', 'popravljen', 'cena', 'tipId'];
}
