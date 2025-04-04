<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Docker extends Model
{
    use HasFactory;

    protected $table = 'dockers'; // Specify the table name

    protected $fillable = [
        'id',
        'semester',
        'subject',
        'pullCommand',
        'runCommand',
        'instructions',
        'notes',
    ];

    public $incrementing = false; // Since ID is a string
    protected $keyType = 'string'; // Define primary key type
}
