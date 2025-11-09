<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CloseKasChild extends Model
{
    protected $fillable = [
        "kas_parent",
        "credit",
        "debit",
        "proof_payment",
        "type_payment",
        "desc",
        "date",
        "notes"
    ];
}
