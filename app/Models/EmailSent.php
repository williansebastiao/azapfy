<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSent extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'is_sent',
        'error',
        'adapter'
    ];
}
