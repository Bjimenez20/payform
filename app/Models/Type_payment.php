<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_payment extends Model
{
    use HasFactory;

    protected $table = 'payment_type';

    protected $fillable = [
        'name',
        'state_id'
    ];

    public function state_id()
    {
        return $this->belongsTo(State::class);
    }
}
