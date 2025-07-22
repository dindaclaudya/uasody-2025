<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Field-field yang boleh diisi massal (misal lewat create() atau update())
    protected $fillable = [
        'name',
        'description',
        'deadline',
    ];
}
