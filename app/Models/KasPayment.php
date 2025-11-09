<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KasPayment extends Model
{
    protected $fillable = [
        "credit",
        "debit",
        "proof_payment",
        "type_payment",
        "desc",
        "date",
        "notes",
    ];
}
