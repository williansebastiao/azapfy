<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'document_code',
        'amount',
        'date_of_issue',
        'document_sender',
        'sender_name',
        'document_transporter',
        'transporter_name',
        'active',
    ];
}
