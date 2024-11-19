<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubscribedService extends Model
{
    protected $fillable = [
        'service_id',
        'title',
        'description',
        'price_per_hour',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
    public function review()
    {
        return $this->hasMany(Review::class);
    }
    public function serviceProvider()
    {
        return $this->hasMany(ServiceProvider::class);
    }
}
