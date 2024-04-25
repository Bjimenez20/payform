<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payform extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    
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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('archivo');
    }
}
