<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id_fk',
        'book_id_fk',
        'rent_start_date',
        'rent_end_date',
    ];
}
