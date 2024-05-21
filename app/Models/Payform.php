<?php

namespace App\Models;

use App\Models\Type_payment;
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
        'payment_type',
        'email',
        'payment_date',
        'approximate_amounte',
        'payment_link'
    ];

    protected $casts = [
        'created_at' => 'date'
    ];

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function type_payment()
    {
        return $this->belongsTo(Type_payment::class, 'payment_type', 'id');
    }

    public function type_flight()
    {
        return $this->belongsTo(Type_flight::class, 'flight_type', 'id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('archivo');
    }
}
