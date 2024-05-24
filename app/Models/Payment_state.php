<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_state extends Model
{
    use HasFactory;

    protected $table = 'payment_states';

    protected $fillable = [
        'name'
    ];

    public function name()
    {
        return $this->belongsTo(Payform::class);
    }
}
