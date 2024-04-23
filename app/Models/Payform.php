<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payform extends Model
{
    use HasFactory;

    protected $table = 'payment';

    protected $fillable = [
        'type_payment',
        'email',
        'payment_date',
        'approximate_amounte'
    ];

    public function type_payment()
    {
        return $this->belongsTo(Type_Payment::class);
    }
}
