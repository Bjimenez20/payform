<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = 'states';

    protected $fillable = [
        'name'
    ];

    public function name()
    {
        return $this->belongsTo(Type_Payment::class);
    }
}
